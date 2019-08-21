<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\HandbookCategoryRepositoryInterface;
use App\Repositories\HandbookRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class HandbookController extends Controller
{
    /**
     * Handbook Category repository
     *
     * @var HandbookCategoryRepositoryInterface
    */
    protected $handbookCategories;

    /**
     * Handbook repository
     *
     * @var HandbookRepositoryInterface
    */
    protected $handbooks;

    /**
     * Create a new instance
     *
     * @param HandbookCategoryRepositoryInterface $handbookCategoryRepository
     * @param HandbookRepositoryInterface $handbookRepository
     * @return void
    */
    public function __construct(HandbookCategoryRepositoryInterface $handbookCategoryRepository,
                                HandbookRepositoryInterface $handbookRepository)
    {
        $this->handbookCategories = $handbookCategoryRepository;
        $this->handbooks = $handbookRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'handbooks' => $this->handbooks->all()
        ];

        return view('admin.handbooks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            '$categories' => $this->handbookCategories->getTree()
        ];

        return view('admin.handbooks.create', $data);
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
            'ru_title' => 'required|unique:handbooks|max:255',
            'en_title' => 'required|unique:handbooks|max:255',
            'uz_title' => 'required|unique:handbooks|max:255'
        ]);
        $handbook = $this->handbooks->create($request);
        $categoryId = $request->get('category_id');
        if($categoryId != 0)
        {
            $position = $this->handbookCategories->get($categoryId)->handbooks()->count();
            $handbook->position = $position;
            $handbook->save();
        }

        if ($request->has('saveQuit'))
            return redirect()->route('admin.handbooks.index');
        return redirect()->route('admin.handbooks.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $handbook = $this->handbooks->get($id);
        $categories = $this->handbookCategories->getTree();

        $data = [
            'handbook' => $handbook,
            'categories' => $categories
        ];

        return view('admin.handbooks.edit', $data);
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
            'ru_title' => 'required|unique:handbooks|max:255',
            'en_title' => 'required|unique:handbooks|max:255',
            'uz_title' => 'required|unique:handbooks|max:255'
        ]);
        $this->handbooks->update($id, $request);

        return redirect()->route('admin.handbooks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->handbooks->delete($id);

        return redirect()->route('admin.handbooks.index');
    }

    /**
     * Change position for handbook
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
    */
    public function changePosition(Request $request)
    {
        $handbookId = $request->get('id');
        $position = $request->get('position');
        if ($this->handbooks->setPosition($handbookId, $position))
            return Response::create('', 200);
        else
            return Response::create('', 400);
    }

    /**
     * Remove image for handbook
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function removeImage(int $id)
    {
        $handbook = $this->handbooks->get($id);
        $handbook->removeImage();

        return redirect()->back();
    }
}
