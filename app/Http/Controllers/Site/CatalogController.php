<?php

namespace App\Http\Controllers\Site;

use App\Repositories\CompanyRepositoryInterface;
use App\Repositories\HandbookCategoryRepositoryInterface;
use App\Repositories\NeedTypeRepositoryInterface;
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
     * Create a new controller instance
     *
     * @param NeedTypeRepositoryInterface $needsRepository
     * @param HandbookCategoryRepositoryInterface $categoriesRepository
     * @param CompanyRepositoryInterface $companyRepository
     * @return void
    */
    public function __construct(NeedTypeRepositoryInterface $needsRepository,
                                HandbookCategoryRepositoryInterface $categoriesRepository,
                                CompanyRepositoryInterface $companyRepository)
    {
        $this->needs = $needsRepository;
        $this->categories = $categoriesRepository;
        $this->companies = $companyRepository;
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
     * Show concrete category
     *
     * @param Request $request
     * @param string $params
     * @return \Illuminate\Http\Response
    */
    public function category(Request $request, string $params)
    {
        $categoriesArray = explode('/', trim($params, '/'));
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
     * @param string $params
     * @return \Illuminate\Http\Response
    */
    public function company(string $params)
    {
        $categoriesArray = explode('/', trim($params, '/'));
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
	        return redirect()->route('site.catalog.category', $category->id);
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
