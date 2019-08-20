<?php

namespace App\Http\Controllers\Admin;

use App\Models\CguCategory;
use App\Repositories\CguCategoryRepository;
use App\Repositories\CguCategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CguCategoryController extends Controller
{
    protected $category;

    /**
     * CguCategoryController constructor.
     * @param CguCategoryRepositoryInterface $category
     */
    public function __construct(CguCategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories' => $this->category->all(),
        ];

        return view('admin.pages.cguCategories.index', $data);
    }


    public function category($id)
    {
        $data = [
            'category' => $this->category->get($id),
        ];

        return view('admin.pages.cguCategories.category', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->category->create();


        return view('admin.pages.cguCategories.create', $data);
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
            'ru_title' => 'required|unique:cgu_categories|max:255',
            'en_title' => 'required|unique:cgu_categories|max:255',
            'uz_title' => 'required|unique:cgu_categories|max:255',
//            'ru_slug' => 'unique:cgu_categories|max:255',
//            'en_slug' => 'unique:cgu_categories|max:255',
//            'uz_slug' => 'unique:cgu_categories|max:255',
        ]);


        $category = $this->category->store($request);

        if($request->has('save'))
            return redirect()->route('admin.cgucategories.edit', $category->id);
        else
            return redirect()->route('admin.cgucategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'categories' => CguCategory::all()->toTree(),
            'category' => CguCategory::find($id)
        ];

        return view('admin.pages.cgucategories.edit', $data);
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

        $category = $this->category->update($id,$request);

        if($request->has('save'))
            return redirect()->route('admin.cgucategories.edit', $category->id);
        else
            return redirect()->route('admin.cgucategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
