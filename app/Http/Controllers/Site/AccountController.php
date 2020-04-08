<?php

namespace App\Http\Controllers\Site;

use App\Repositories\HandbookCategoryRepositoryInterface;
use App\Repositories\TenderRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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

    /**
     * @var TenderRepositoryInterface
     */
    private $tenderRepository;

    /**
     * AccountController constructor.
     * @param UserRepositoryInterface $userRepository
     * @param HandbookCategoryRepositoryInterface $categoryRepository
     */
    public function __construct(UserRepositoryInterface $userRepository,
                                HandbookCategoryRepositoryInterface $categoryRepository,
                                TenderRepositoryInterface $tenderRepository)
    {
        $this->middleware('auth')->except(['telegramCallback']);
        $this->middleware('account.completed')->except(['create', 'store', 'telegramCallback']);

        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tenderRepository = $tenderRepository;
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

    public function create()
    {
        $user = auth()->user();
        return \view('site.pages.account.create', compact('user'));
    }

    public function store(Request $request)
    {
        $userType = $request->get('user_role');
        $user = auth()->user();
        $validationMessages = [
            'required' => 'Это поле обязательно к заполнению',
            'max' => 'Количество символов должно быть не больше :max',
            'integer' => 'Укажите целочисленное значение',
            'date' => 'Неверный формат даты',
            'string' => 'Укажите стороковое значение',
            'email' => 'Неверный формат электронной почты',
            $userType . '_email.unique' => 'Такая электронная почта уже зарегистрирована'
        ];
        Validator::make($request->all(), [
            $userType . '_name' => ['required', 'string', 'max:255'],
            $userType . '_phone_number' => ['required', 'string'],
            'contractor_birthday_date' => Rule::requiredIf($userType == 'contractor' && $request->get('contractor_type') == 'freelancer'),
            $userType . '_email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            $userType . '_about_myself' => ['required', 'string'],
            $userType . '_company_name' => Rule::requiredIf($request->get('customer_type') == 'company' || $request->get('contractor_type') == 'agency'),
            'image' => 'nullable|file'
        ], $validationMessages)->validate();
        $this->userRepository->createAccount($request);
        if ($userType == 'contractor')
            return redirect()->route('site.account.contractor.professional');
        if ($request->hasCookie('tenderId')) {
            $this->tenderRepository->setOwnerToTender($request->cookie('tenderId'), auth()->user()->id);
            \Cookie::forget('tenderId');
            return redirect()->route('site.account.index')->with('success', 'Ваш тендер опубликован, вы можете посмотреть его в разделе "Мои тендеры".');
        }
        return redirect()->route('site.account.index');
    }


    public function savePersonalContractor(Request $request)
    {
        $user = auth()->user();
        $user->authorizeRole('contractor');
        $validationMessages = [
            'required' => 'Это поле обязательно к заполнению',
            'max' => 'Количество символов должно быть не больше :max',
            'integer' => 'Укажите целочисленное значение',
            'date' => 'Неверный формат даты',
            'string' => 'Укажите стороковое значение',
            'email' => 'Неверный формат электронной почты'
        ];
        Validator::make($request->all(), [
            'name' => 'required|max:255|string',
            'gender' => 'required|string',
            'birthday_date' => 'required|date',
            'about_myself' => 'required|string|max:5000',
        ], $validationMessages)->validate();
        $this->userRepository->update($user->id, $request);

        return redirect()->route('site.account.index')->with('success', 'Ваши личные данные обновлены');
    }

    public function professional()
    {
        $user = auth()->user();
        $user->authorizeRole('contractor');
        $chosenSpecs = $user->categories()->pluck('category_id')->toArray();
        $accountPage = 'professional';
        $categories = $this->categoryRepository->all();

        return view('site.pages.account.contractor.professional',
            compact('categories', 'user', 'accountPage', 'chosenSpecs'));
    }

    public function saveProfessional(Request $request)
    {
        $user = auth()->user();
        $user->authorizeRole('contractor');
        $categories = $request->get('categories');
        $user->categories()->detach();
        foreach ($categories as $category) {
            if (isset($category['id'])) {
                $user->categories()->attach($category['id'],
                        ['price_to' => $category['price_to'],
                        'price_from' => $category['price_from'],
                        'price_per_hour' => $category['price_per_hour']]
                );
            }
        }

        return redirect()->route('site.account.contractor.professional')->with('success', 'Ваши профессиональные данные обновлены');
    }

    public function saveCustomerProfile (Request $request)
    {
        $user = auth()->user();
        $user->authorizeRole('customer');
        $validationMessages = [
            'required' => 'Это поле обязательно к заполнению',
            'max' => 'Количество символов должно быть не больше :max',
            'integer' => 'Укажите целочисленное значение',
            'date' => 'Неверный формат даты',
            'string' => 'Укажите стороковое значение',
            'email' => 'Неверный формат электронной почты'
        ];
        Validator::make($request->all(), [
            'image' => 'nullable|image',
            'company_name' => [Rule::requiredIf($user->customer_type == 'company')],
            'about_myself' => 'required|string|max:5000',
            'foundation_year' => 'nullable|integer',
            'site' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ], $validationMessages)->validate();

        $this->userRepository->update($user->id, $request);

        return redirect()->route('site.account.index')->with('success', 'Ваш профиль обновлён');
    }

    public function tenders()
    {
        $user = auth()->user();
        $accountPage = 'tenders';
        if ($user->hasRole('customer')) {
            return \view('site.pages.account.customer.tenders', compact('user', 'accountPage'));
        } else if ($user->hasRole('contractor')) {
            return \view('site.pages.account.contractor.tenders', compact('user', 'accountPage'));
        } else {
            abort(404);
        }
    }

    public function editTender(string $slug)
    {
        $user = auth()->user();
        $tender = $user->ownedTenders()->where('slug', $slug)->first();
        $accountPage = 'tenders';
        abort_if(!$tender, 404);
        return \view('site.pages.account.customer.editTender', compact('user', 'tender', 'accountPage'));
    }

    public function tenderCandidates (string $slug) {
        $user = auth()->user();
        $tender = $user->ownedTenders()->where('slug', $slug)->first();
        abort_if(!$tender, 404);
        $accountPage = 'tenders';
        return \view('site.pages.account.customer.candidates', compact('user', 'accountPage', 'tender'));
    }

    public function telegramCallback(Request $request)
    {
        if ($this->checkTelegramAuthorization($request->all())) {
            $telegramId = $request->get('id');
            $user = $this->userRepository->getUserByTelegramId((int) $telegramId);
            if (!$user) {
                $user = $this->userRepository->createUserViaTelegram($request);
            }
            \Auth::loginUsingId($user->id);
            return redirect()->route('site.account.index');
        } else {
            return back()->with('error', 'Ошибка при попытке авторизации через Telegram');
        }
    }

    private function checkTelegramAuthorization($auth_data)
    {
        $check_hash = $auth_data['hash'];
        unset($auth_data['hash']);
        $data_check_arr = [];
        foreach ($auth_data as $key => $value) {
            $data_check_arr[] = $key . '=' . $value;
        }
        sort($data_check_arr);

        $data_check_string = implode("\n", $data_check_arr);
        $secret_key = hash('sha256', env('TELEGRAM_BOT_TOKEN'), true);
        $hash = hash_hmac('sha256', $data_check_string, $secret_key);
        if (strcmp($hash, $check_hash) !== 0 || (time() - $auth_data['auth_date']) > 86400) {
            return false;
        }
        return true;
    }
}
