<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\HandbookCategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HandbookCategoryController extends Controller
{
    /**
     * HandbookCategory repository
     *
     * @var HandbookCategoryRepositoryInterface
    */
    protected $handbookCategoryRepository;

    /**
     * Create a new instance
     *
     * @param HandbookCategoryRepositoryInterface $handbookCategoryRepository
     * @return void
    */
    public function __construct(HandbookCategoryRepositoryInterface $handbookCategoryRepository)
    {
        $this->handbookCategoryRepository = $handbookCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories' => $this->handbookCategoryRepository->all()
        ];

        return view('admin.pages.handbookCategories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => $this->handbookCategoryRepository->getTree()
        ];

        return view('admin.pages.handbookCategories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ru_title' => 'required|unique:handbook_categories|max:255',
            'en_title' => 'required|unique:handbook_categories|max:255',
            'uz_title' => 'required|unique:handbook_categories|max:255',
        ]);

        $category = $this->handbookCategoryRepository->store($request);
        if ($request->has('saveQuit'))
        {
            $parent = $category->getParentId();
            if ($parent != null)
                return redirect()->route('admin.handbookcategories.show', $parent);
            else
                return redirect()->route('admin.handbookcategories.index');
        }
        else
            return redirect()->route('admin.handbookcategories.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'category' => $this->handbookCategoryRepository->get($id)
        ];

        return view('admin.pages.handbookCategories.category', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'category' => $this->handbookCategoryRepository->get($id),
            'categories' => $this->handbookCategoryRepository->getTree()
        ];
        return view('admin.pages.handbookCategories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ru_title' => 'required|max:255',
            'en_title' => 'required|max:255',
            'uz_title' => 'required|max:255',
        ]);
        $category = $this->handbookCategoryRepository->update($id, $request);

        $parentId = $category->getParentId();
        if ($parentId)
            return redirect()->route('admin.handbookcategories.show');
        else
            return redirect()->route('admin.handbookCategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = $this->handbookCategoryRepository->delete($id);

        if ($parent != null && $this->handbookCategoryRepository->get($parent)->hasCategories())
            return redirect()->route('admin.handbookcategories.show');
        else
            return redirect()->route('admin.handbookcategories.index');
    }

    /**
     * Remove image for category
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function removeImage(int $id)
    {
        $category = $this->handbookCategoryRepository->get($id);
        $category->removeImage();

        return redirect()->back();
    }
}
