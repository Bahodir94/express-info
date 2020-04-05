<?php

namespace App\Http\Controllers\Site;

use App\Repositories\HandbookCategoryRepositoryInterface;
use App\Repositories\MenuRepositoryInterface;
use App\Repositories\NeedTypeRepositoryInterface;
use App\Repositories\TenderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return view('site.pages.tenders.index', compact('tenders'));
    }

    public function category(string $params)
    {
       $paramsArray = explode('/', $params);
       $tenders = collect();
       if (count($paramsArray) === 1) {
           $menuItemSlug = $paramsArray[0];
           $menuItem = $this->menuItemsRepository->getBySlug($menuItemSlug);
           foreach ($menuItem->categories as $category)
               $tenders = $tenders->merge($category->tenders);
           $tenders = $tenders->unique(function ($item) {
               return $item->id;
           });
       } else {
           $categorySlug = end($paramsArray);
           $category = $this->categoryRepository->getBySlug($categorySlug);
           $tenders = $category->tenders;
       }

       return view('site.pages.tenders.index', compact('tenders'));
    }

    public function show(string $slug)
    {
        $tender = $this->tenderRepository->getBySlug($slug);
        abort_if(!$tender, 404);
        return view('site.pages.tenders.show', compact('tender'));
    }

    public function create()
    {
        return view('site.pages.tenders.common.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'categories' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'files' => 'nullable',
            'budget' => 'required|integer',
            'deadline' => 'required|date',
            'client_company_name' => Rule::requiredIf($request->get('client_type') === 'company'),
            'firstName' => 'required|string|max:255',
            'secondName' => 'required|string|max:255',
            'client_phone_number' => 'required|string|max:255',
            'client_email' => 'required|email'
        ])->validate();
        $tender = $this->tenderRepository->create($request);

        return redirect()->route('site.contractors.index')->with('success', "Тендер $tender->title создан и опубликован! Вы так же можете выбрать себе исполнителей по желанию");
    }
}
