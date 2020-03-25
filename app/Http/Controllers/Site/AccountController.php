<?php

namespace App\Http\Controllers\Site;

use App\Repositories\HandbookCategoryRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var HandbookCategoryRepositoryInterface
     */
    private $categoryRepository;


    public function __construct(UserRepositoryInterface $userRepository, HandbookCategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('account.completed');

        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show main account page
     *
     * @return Factory|View
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('contractor')) {
            $accountPage = 'personal';
            return view('site.pages.account.contractor.index', compact('user', 'accountPage'));
        }
        else if ($user->hasRole('customer')) {
            if ($user->customer_type == 'company') $accountPage = 'company';
            return view('site.pages.account.customer.index', compact('user', 'accountPage'));
        }
        else
            abort(403);
    }

    public function savePersonalContractor(Request $request)
    {
        $user = auth()->user();
        $user->authorizeRole('contractor');
        $request->validate([
            'firstName' => 'required|max:255|string',
            'secondName' => 'required|string|max:255',
            'gender' => 'required|string',
            'birthday_date' => 'required|date',
            'about_myself' => 'required|string|max:5000',
        ]);
        $this->userRepository->update($user->id, $request);

        return redirect()->route('site.account.index')->with('success', 'Ваши личные данные обновлены');
    }

    public function professional()
    {
        $user = auth()->user();
        $rawSpecializations = $user->specialization;
        $specializations = [];
        $chosenSpecs = [];
        $accountPage = 'professional';
        $categories = $this->categoryRepository->all();
        if ($rawSpecializations) {
            $explodedSpecializations = explode(';', $rawSpecializations);
            foreach ($explodedSpecializations as $specialization) {
                $specializationsParts = explode(',', $specialization);
                $chosenSpecs[] = (int)$specializationsParts[0];
                $specializations[(int)$specializationsParts[0]] = [
                    'minPrice' => $specializationsParts[1],
                    'maxPrice' => $specializationsParts[2],
                    'pricePerHouse' => $specializationsParts[3]
                ];
            }
        }

        return view('site.pages.account.contractor.professional',
            compact('categories', 'user', 'specializations', 'accountPage', 'chosenSpecs'));
    }

    public function saveProfessional(Request $request)
    {
        $user = auth()->user();
        $specializationsArray = $request->get('specializations');
        $specializations = [];
        foreach ($specializationsArray as $item) {
            if (isset($item['id'])) {
                $specializationItem = implode(',', $item);
                $specializations[] = $specializationItem;
            }
        }
        $user->specialization = implode(';', $specializations);
        $user->save();

        return redirect()->route('site.account.professional')->with('success', 'Ваши профессиональные данные обновлены');
    }
}
