<?php

namespace App\Http\Controllers\Site;

use App\Repositories\HandbookCategoryRepositoryInterface;
use App\Repositories\MenuRepositoryInterface;
use App\Repositories\NeedTypeRepositoryInterface;
use App\Repositories\TenderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TenderController extends Controller
{

    /**
     * @var NeedTypeRepositoryInterface
     */
    private $needRepository;

    /**
     * @var TenderRepositoryInterface
     */
    private $tenderRepository;

    /**
     * @var HandbookCategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * @var MenuRepositoryInterface
     */
    private $menuItemsRepository;

    public function __construct(NeedTypeRepositoryInterface $needRepository,
                                TenderRepositoryInterface $tenderRepository,
                                HandbookCategoryRepositoryInterface $categoryRepository,
                                MenuRepositoryInterface $menuItemsRepository)
    {
        $this->needRepository = $needRepository;
        $this->tenderRepository = $tenderRepository;
        $this->categoryRepository = $categoryRepository;
        $this->menuItemsRepository = $menuItemsRepository;
    }

    public function index()
    {
        $tenders = $this->tenderRepository->allOrderedByCreatedAt();
        $currentCategory = null;
        return view('site.pages.tenders.index', compact('tenders', 'currentCategory'));
    }

    public function category(string $params)
    {
        if (preg_match('/[A-Z]/', $params)) {
            return redirect(route('site.tenders.category', strtolower($params)), 301);
        }
        if (substr_count($params, 'tenders') > 1) {
            $paramsArray = explode('/', $params);
            $uniqueParams = array_unique($paramsArray);
            return redirect(route('site.tenders.category', implode('/', $uniqueParams)), 301);
        }
        $paramsArray = explode('/', $params);
        $tenders = collect();
        $currentCategory = null;
        if (count($paramsArray) === 1) {
            $menuItemSlug = $paramsArray[0];
            $menuItem = $this->menuItemsRepository->getBySlug($menuItemSlug);
            if ($menuItem) {
                if ($menuItem->ru_slug !== $params)
                    return redirect(route('site.tenders.category', $menuItem->ru_slug), 301);
                foreach ($menuItem->categories as $category)
                    $tenders = $tenders->merge($category->tenders()->whereNotNull('owner_id')->get());
                $tenders = $tenders->unique(function ($item) {
                    return $item->id;
                });
                $currentCategory = $menuItem;
                return view('site.pages.tenders.index', compact('tenders', 'currentCategory'));
            }
            $tender = $this->tenderRepository->getBySlug($menuItemSlug);
            if ($tender) {
                if ($tender->slug !== $params) {
                    return redirect(route('site.catalog.tenders', $tender->slug), 301);
                }
                return view('site.pages.tenders.show', compact('tender'));
            }
            abort(404, "Ресурс не найден");
        } else {
            $categorySlug = end($paramsArray);
            $currentCategory = $this->categoryRepository->getBySlug($categorySlug);
            if ($currentCategory) {
                if ($currentCategory->getAncestorsSlugs() !== $params)
                    return redirect(route('site.tenders.category', $currentCategory->getAncestorsSlugs()), 301);
                $tenders = $currentCategory->tenders;
                return view('site.pages.tenders.index', compact('tenders', 'currentCategory'));
            } else {
                abort(404, "Ресурс не найден");
            }
        }
    }

    public function show(string $slug)
    {
        $tender = $this->tenderRepository->getBySlug($slug);
        abort_if(!$tender, 404);
        return view('site.pages.tenders.show', compact('tender'));
    }

    public function create()
    {
        $user = auth()->user();
        if ($user) {
            $user->authorizeRole('customer');
        }
        return view('site.pages.tenders.common.create');
    }

    public function store(Request $request)
    {
        $validationMessages = [
            'required' => 'Это поле обязательно к заполнению',
            'max' => 'Количество символов должно быть не больше :max',
            'integer' => 'Укажите целочисленное значение',
            'date' => 'Неверный формат даты',
            'string' => 'Укажите стороковое значение',
            'email' => 'Неверный формат электронной почты'
        ];
        if (auth()->user())
            auth()->user()->authorizeRole('customer');
        Validator::make($request->all(), [
            'categories' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'files' => 'nullable',
            'budget' => 'required|integer',
            'deadline' => 'required|date'
        ], $validationMessages)->validate();
        $tender = $this->tenderRepository->create($request);

        if (!Auth::check()) {
            if (session()->has('contractors')) {
                $contractors = session('contractors');
                foreach ($contractors as $contractor)
                    $tender->requests()->create(['user_id' => $contractor['id'], 'invited' => true]);
                session()->forget('contractors');
                session()->save();
            }
            return redirect()->route('register')->withCookie(cookie('tenderId', "$tender->id"))->with('success', 'Ваш тендер сохранён и будет опубликован только после регистрации');
        }

        return redirect()->route('site.contractors.index')->with('success', "Тендер $tender->title создан и опубликован! Вы так же можете выбрать себе исполнителей по желанию");
    }

    public function makeRequest(Request $request)
    {
        $request->validate([
            'budget_from' => 'required|max:255',
            'budget_to' => 'required|max:255',
            'period_to' => 'required|max:255',
            'period_from' => 'required|max:255',
            'comment' => 'nullable|string|max:255'
        ]);
        $tenderRequest = $this->tenderRepository->createRequest($request);
        $tenderTitle = $tenderRequest->tender->title;
        return back()->with('success', "Вы подали заявку на участие в конкурсе \"$tenderTitle\"");
    }

    public function cancelRequest(Request $request)
    {
        $requestId = $request->get('requestId');
        $this->tenderRepository->cancelRequest($requestId);
        if ($request->has('redirect_to')) {
            return redirect($request->get('redirect_to'))->with('account.success', 'Заявка отклонена.');
        }
        return back()->with('success', 'Ваша заявка отменена');
    }

    public function update(Request $request, int $id)
    {
        $validationMessages = [
            'required' => 'Это поле обязательно к заполнению',
            'max' => 'Количество символов должно быть не больше :max',
            'integer' => 'Укажите целочисленное значение',
            'date' => 'Неверный формат даты',
            'string' => 'Укажите стороковое значение',
            'email' => 'Неверный формат электронной почты'
        ];
        Validator::make($request->all(), [
            'categories' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'files' => 'nullable',
            'budget' => 'required|integer',
            'deadline' => 'required|date'
        ], $validationMessages)->validate();
        $this->tenderRepository->update($id, $request);
        return redirect($request->get('redirect_to'))->with('account.success', 'Конкрус отредактитрован!');
    }

    public function delete(Request $request, int $id)
    {
        $this->tenderRepository->delete($id);

        return redirect($request->get('redirect_to'))->with('account.success', 'Конкурс удалён');
    }

    public function acceptTenderRequest(Request $request, int $tenderId, int $requestId)
    {
        $redirectTo = $request->get('redirect_to');
        if ($this->tenderRepository->acceptRequest($tenderId, $requestId)) {
            return redirect($redirectTo)->with('account.success', 'Исполнитель на этот конкурс назначен! ');
        } else {
            return redirect($redirectTo)->with('account.error', 'Невозможно назначить исполнителя на этот конкурс');
        }
    }
}
