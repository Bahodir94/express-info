<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CguCategoryRepository;
use App\Repositories\CguCategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CguCategoryController extends Controller
{
    protected $category;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => $this->category->all(),
        ];

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
            return redirect()->route('admin.cgucategories.index');
        else if($request->has('saveQuit'))
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
        //
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
        //
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
