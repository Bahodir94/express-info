<?php

namespace App\Http\Controllers\Site;

use App\Helpers\SlugHelper;
use App\Repositories\HandbookCategoryRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractorsController extends Controller
{

    /**
     * Users repository
     *
     * @var UserRepositoryInterface
     */
    private $users;

    /**
     * Category repository
     *
     * @var HandbookCategoryRepositoryInterface
     */
    private $categories;

    /**
     * ContractorsController constructor.
     * @param UserRepositoryInterface $userRepository
     * @param HandbookCategoryRepositoryInterface $categoriesRepository
     */
    public function __construct(UserRepositoryInterface $userRepository,
                                HandbookCategoryRepositoryInterface $categoriesRepository)
    {
        $this->users = $userRepository;
        $this->categories = $categoriesRepository;
    }

    /**
     * Show all categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categories->all();
        return view('site.pages.contractors.index', compact('categories'));
    }

    /**
     * Show contractors from category
     *
     * @param string $params
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(string $params)
    {
        if (preg_match('/[A-Z]/', $params)) {
            return redirect(route('site.catalog.main', strtolower($params)), 301);
        }
        if (strpos($params, 'tenders') !== false) {
            $paramsArray = explode('/', $params);
            $slug = end($paramsArray);
            return redirect(route('site.tenders.category', "tenders/$slug"), 301);
        }
        if (strpos($params, 'blog') !== false) {
            $paramsArray = explode('/', $params);
            $slug = end($paramsArray);
            return redirect(route('site.blog.main', $slug), 301);
        }
        $paramsArray = explode('/', $params);
        $slug = end($paramsArray);
        $category = $this->categories->getBySlug($slug);
        abort_if(!$category, 404);
        if ($category->getAncestorsSlugs() !== $params)
            return redirect(route('site.catalog.main', $category->getAncestorsSlugs()), 301);
        $contractors = $category->getAllCompaniesFromDescendingCategories();
        return view('site.pages.contractors.category', compact('category', 'contractors'));
    }

    /**
     * Show concrete contractor
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contractor(string $slug)
    {
        $contractor = $this->users->getContractorBySlug($slug);
        $portfolio = $this->users->getPortfolioBySlug($slug);
        abort_if(!$contractor, 404);
        abort_if(!$portfolio, 404);
        return view('site.pages.contractors.show', compact('contractor', 'portfolio'));
    }
}
