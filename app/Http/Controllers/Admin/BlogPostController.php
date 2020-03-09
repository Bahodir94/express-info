<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use App\Repositories\BlogPostRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    protected $postRepository;


    public function __construct(BlogPostRepositoryInterface $blogPostRepository)
    {
        $this->postRepository = $blogPostRepository;
    }


    public function index()
    {
        $data = [
            'posts' => $this->postRepository->all()
        ];

        return view('admin.pages.blog.posts.index', $data);
    }


    public function create()
    {
        return view('admin.pages.blog.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'ru_title' => 'required|unique:blog_posts|max:255',
            'ru_short_content' => 'nullable',
            'en_short_content' => 'nullable',
            'uz_short_content' => 'nullable',
            'ru_content'=>'nullable',
            'uz_content'=>'nullable',
            'en_content'=>'nullable',
            'image' => 'nullable|image'
        ]);

        $post = $this->postRepository->store($request);

        if ($request->has('save'))
            return redirect()->route('admin.blogposts.create');
        else
            return redirect()->route('admin.blogposts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $data = [
            'post' => $this->postRepository->get($id),
           // 'categories' => $this->postRepository->getCategoriesTree()
        ];

        return view('admin.pages.blog.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ru_title' => 'required|max:255',
            'image' => 'image',
        ]);

        $post = $this->postRepository->update($id, $request);

        if ($request->has('save'))
            return redirect()->route('admin.blogposts.edit', $post->id);
        else
            return redirect()->route('admin.blogposts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->postRepository->delete($id);

        return redirect()->route('admin.blogposts.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function removeImage($id)
    {
        $post = $this->postRepository->get($id);
        $post->removeImage();

        return redirect()->route('admin.blogposts.edit', $post->id);
    }

    public function changePosition(Request $request)
    {
        $category = BlogPost::find($request->get('id'));
        $category->position = $request->get('position');
        if ($category->save())
            return json_encode(['message' => 'success']);
        else
            return json_encode(['message' => 'failed']);
    }
}
