<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BlogCategoryRepositoryInterface;
use App\Repositories\BlogPostRepositoryInterface;
use App\Helpers\SlugHelper;

class BlogController extends Controller
{

    private $blogcategories;
    private $blogposts;

    public function __construct(BlogCategoryRepositoryInterface $blogcategoriesRepository,
                                BlogPostRepositoryInterface $blogpostsRepository)
    {
        $this->_blogcategories = $blogcategoriesRepository;
        $this->_blogposts = $blogpostsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogcategories = $this->_blogcategories->all();
        $blogposts = $this->_blogposts->all();
        return view('blog.index', compact('blogcategories', 'blogposts'));
    }

}
