<?php

namespace App\Repositories;


use App\Models\BlogCategory;
use App\Models\BlogPost;

class BlogPostRepository implements BlogPostRepositoryInterface
{
    /**
     * @param $post_id
     * @return mixed
     */
    public function get($post_id)
    {
        return BlogPost::find($post_id);
    }

    /**
     *
     * @return mixed
     */
    public function all()
    {
        return BlogPost::/*orderBy('position', 'asc')->*/get();
    }

    /**
     *
     * @param int
     */
    public function delete($post_id)
    {
        $post = $this->get($post_id);
        $post->remove();
    }


    /**
     * @param $post_id
     * @param object $post_data
     * @return mixed
     */
    public function update($post_id, object $post_data)
    {
        $post = $this->get($post_id);
        $post->update($post_data->all());
        $post->uploadImage($post_data->file('image'));

        return $post;
    }

    /**
     * Store a category
     *
     * @param object $blog_data
     * @return mixed
     */
    public function store(object $blog_data)
    {
        $post = BlogPost::create($blog_data->all());
        $post->uploadImage($blog_data->file('image'));

        return $post;
    }

    /**
     * @return mixed
     */
    public function getCategoriesTree()
    {
        return BlogCategory::all()->toTree();
    }
}