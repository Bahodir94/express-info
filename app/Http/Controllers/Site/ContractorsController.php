<?php

namespace App\Http\Controllers\Site;

use App\Helpers\SlugHelper;
use App\Repositories\HandbookCategoryRepositoryInterface;
use App\Repositories\TenderRepositoryInterface;
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
     * @var TenderRepositoryInterface
     */
    private $tenders;

    /**
     * ContractorsController constructor.
     * @param UserRepositoryInterface $userRepository
     * @param HandbookCategoryRepositoryInterface $categoriesRepository
     */
    public function __construct(UserRepositoryInterface $userRepository,
                                HandbookCategoryRepositoryInterface $categoriesRepository,
                                TenderRepositoryInterface $tenderRepository)
    {
        $this->users = $userRepository;
        $this->categories = $categoriesRepository;
        $this->tenders = $tenderRepository;
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

        return view('site.pages.contractors.show', compact('contractor', 'portfolio'));
    }

    public function addContractor(int $contractorId, int $tenderId) {
        $this->tenders->addContractor($tenderId, $contractorId);
        return back()->with('success', 'Исполнитель добавлен в конкурс!');
    }

    public function addContractorForNonAuth(int $contractorId) {
        $user = $this->users->get($contractorId);
        $contractors = \Session::get('contractors', collect());
        if ($contractors->contains('id', $contractorId))
            return back();
        $contractors->push([
            'id' => $contractorId,
            'name' => $user->getCommonTitle(),
            'image' => $user->getImage()
        ]);
        \Session::put('contractors', $contractors);
        return back();
    }

    public function deleteContractorFromSession(int $contractorId) {
        $contractors = \Session::get('contractors');
        if (!$contractors->contains('id', $contractorId))
            return back();
        $contractors = $contractors->filter(function ($item) use ($contractorId) {
            return $item['id'] !== $contractorId;
        });
        if (count($contractors) === 0) {
            \Session::forget('contractors');
            \Session::save();
            return back();
        }
        \Session::put('contractors', $contractors);
        return back();
    }

    public function deleteAllContractorsFromSession() {
        \Session::forget('contractors');
        \Session::save();
        return back();
    }
}
