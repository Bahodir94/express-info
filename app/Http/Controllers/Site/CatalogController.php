<?php

namespace App\Http\Controllers\Site;

use App\Repositories\CompanyRepositoryInterface;
use App\Repositories\HandbookCategoryRepositoryInterface;
use App\Repositories\NeedTypeRepositoryInterface;
use App\Repositories\MenuRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    /**
     * Needs repository
     *
     * @var NeedTypeRepositoryInterface
    */
    private $needs;

    /**
     * Category repository
     *
     * @var HandbookCategoryRepositoryInterface
    */
    private $categories;

    /**
     * Company repository
     *
     * @var CompanyRepositoryInterface
    */
    private $companies;

    /**
     * Menu items repository
     *
     * @var MenuRepositoryInterface
     */
    private $menus;

    /**
     * Create a new controller instance
     *
     * @param NeedTypeRepositoryInterface $needsRepository
     * @param HandbookCategoryRepositoryInterface $categoriesRepository
     * @param CompanyRepositoryInterface $companyRepository
     * @param MenuRepositoryInterface $menuRepository
     * @return void
    */
    public function __construct(NeedTypeRepositoryInterface $needsRepository,
                                HandbookCategoryRepositoryInterface $categoriesRepository,
                                CompanyRepositoryInterface $companyRepository,
                                MenuRepositoryInterface $menuRepository)
    {
        $this->needs = $needsRepository;
        $this->categories = $categoriesRepository;
        $this->companies = $companyRepository;
        $this->menus = $menuRepository;
    }

    /**
     * Main page of catalog
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $favoritesCategories = $this->categories->getFavoriteCategories();
        $parentCategories = $this->categories->all();

        return view('site.pages.catalog.index', compact('favoritesCategories',
            'parentCategories'));
    }

    /**
     * Action for catalog
     *
     * @param Request $request
     * @param string $params
     * @return \Illuminate\Http\Response
    */
    public function catalog(Request $request, string $params)
    {
        $paramsArray = explode('/', trim($params, '/'));
        $slug = end($paramsArray);

        $need = $this->needs->getBySlug($slug);
        if ($need)
            return $this->processNeed($need);
        $menuItem = $this->menus->getBySlug($slug);
        if ($menuItem)
            return $this->processMenuItem($menuItem);
        $category = $this->categories->getBySlug($slug);
        if ($category)
            return $this->processCategory($request, $category);
        $company = $this->companies->getBySlug($slug);
        if ($company)
            return $this->processCompany($company);
        abort(404);
    }

    private function processNeed($need)
    {
        return view('site.pages.catalog.need', compact('need'));
    }

    private function processMenuItem($menuItem)
    {
        return view('site.pages.catalog.menuItem', compact('menuItem'));
    }

    private function processCategory(Request $request, $category)
    {
        $descendantsCategories = $category->descendants;
        $companies = collect();
        $resultCompanies = [];
        $companies = $companies->merge($category->companies);
        foreach ($descendantsCategories as $descendantsCategory)
            $companies = $companies->merge($descendantsCategory->companies);
        if ($request->has('service'))
        {
            $serviceId = $request->get('service');
            foreach ($companies as $company)
                if ($company->hasService($serviceId))
                    array_push($resultCompanies, $company);
        }
        else
            $resultCompanies = $companies;

        $data = [
            'category' => $category,
            'companies' => $resultCompanies
        ];

        return view('site.pages.catalog.companies', $data);
    }

    private function processCompany($company)
    {
        return view('site.pages.catalog.company', compact('company'));
    }

    /**
     * Show concrete type of need
     *
     * @param string $needSlug
     * @return \Illuminate\Http\Response
    */
    public function need(string $needSlug)
    {
        if (is_numeric($needSlug))
        {
            $id = intval($needSlug);
            $need = $this->needs->get($id);
            return redirect()->route('site.catalog.need', $need->ru_slug);
        }
        $need = $this->needs->getBySlug($needSlug);

        return view('site.pages.catalog.need', compact('need'));
    }

    /**
     * Show concrete category
     *
     * @param Request $request
     * @param string $categoryParams
     * @return \Illuminate\Http\Response
    */
    public function category(Request $request, string $categoryParams)
    {
        $categoriesArray = explode('/', trim($categoryParams, '/'));
        $slug = end($categoriesArray);
        if (is_numeric($slug))
        {
            $id = intval($slug);
            $category = $this->categories->get($id);
            return redirect()->route('site.catalog.category', $category->ru_slug);
        }

        $category = $this->categories->getBySlug($slug);
        $descendantsCategories = $category->descendants;
        $companies = collect();
        $resultCompanies = [];
        $companies = $companies->merge($category->companies);
        foreach ($descendantsCategories as $descendantsCategory)
            $companies = $companies->merge($descendantsCategory->companies);
        if ($request->has('service'))
        {
            $serviceId = $request->get('service');
            foreach ($companies as $company)
                if ($company->hasService($serviceId))
                    array_push($resultCompanies, $company);
        }
        else
            $resultCompanies = $companies;

        $data = [
            'category' => $category,
            'companies' => $resultCompanies
        ];

        return view('site.pages.catalog.companies', $data);
    }

    /**
     * Show company page
     *
     * @param string $companyParams
     * @return \Illuminate\Http\Response
    */
    public function company(string $companyParams)
    {
        $categoriesArray = explode('/', trim($companyParams, '/'));
        $slug = end($categoriesArray);
        if (is_numeric($slug))
        {
            $id = intval($slug);
            $company = $this->companies->get($id);
            return redirect()->route('site.catalog.company', $company->ru_slug);
        }

        $company = $this->companies->getBySlug($slug);

        return view('site.pages.catalog.company', compact('company'));
    }

    /**
     * Seacrh companies or/and categories
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->get('query');
	    $category = $this->categories->search($query, $findOne = true);
	    if ($category)
	        return redirect()->route('site.catalog.main', $category->getAncestorsSlugs());
	    $data = [];
	    $categories = $this->categories->search($query);
	    $companies = $this->companies->search($query);
	    if ($categories->count() > 0  and $companies->count() == 0)
            foreach ($categories as $category)
                $companies = $companies->merge($category->companies);
	    if ($companies->count() == 0 and $categories->count() == 1 and $categories[0]->hasCategories())
            $companies = $categories[0]->getAllCompaniesFromDescendingCategories();
	    $data['categories'] = $categories;
	    $data['companies'] = $companies;
        return view('site.pages.catalog.search', $data);
    }
}
