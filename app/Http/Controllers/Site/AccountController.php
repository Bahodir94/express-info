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
            else $accountPage = 'personal';
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
            'name' => 'required|max:255|string',
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
        $user->authorizeRole('contractor');
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
        $user->authorizeRole('contractor');
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

        return redirect()->route('site.account.contractor.professional')->with('success', 'Ваши профессиональные данные обновлены');
    }

    public function saveCompany(Request $request)
    {
        $user = auth()->user();
        $user->authorizeRole('customer');
        $request->validate([
            'image' => 'nullable|image',
            'company_name' => 'required|max:255|string',
            'about_myself' => 'nullable|string|max:5000',
            'foundation_year' => 'nullable|int|max:255',
            'site' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);
        $this->userRepository->update($user->id, $request);

        return redirect()->route('site.account.index')->with('success', 'Ваши данные о компании изменены');
    }

    public function personalCustomer()
    {
        $user = auth()->user();
        $accountPage = 'personal';
        return view('site.pages.account.customer.personal', compact('user', 'accountPage'));
    }

    public function personalCustomerSave (Request $request)
    {
        $user = auth()->user();
        $user->authorizeRole('customer');
        $request->validate([
            'firstName' => 'required|max:255|string',
            'secondName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image' => 'nullable|image',
        ]);

        $this->userRepository->update($user->id, $request);

        return redirect()->route('site.account.customer.personal')->with('success', 'Ваш профиль обновлён');
    }
}
