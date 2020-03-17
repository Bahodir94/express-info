<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BlogCategoryRepositoryInterface;
use App\Repositories\BlogPostRepositoryInterface;
use App\Helpers\SlugHelper;

class BlogController extends Controller
{
    /**
     * @var BlogCategoryRepositoryInterface
     */
    private $blogCategories;

    /**
     * @var BlogPostRepositoryInterface
     */
    private $blogPosts;

    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepository,
                                BlogPostRepositoryInterface $blogPostRepository)
    {
        $this->blogCategories = $blogCategoryRepository;
        $this->blogPosts = $blogPostRepository;
    }

    /**
     * Display a home page of the blog
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogcategories = $this->blogCategories->all();
        $blogposts = $this->blogPosts->all();
        return view('blog.index', compact('blogcategories', 'blogposts'));
    }

}
