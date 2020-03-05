<?php

namespace App\Repositories;

use App\Models\BlogCategory;
//use Your Model

/**
 * Class BlogCategoryRepository.
 */
class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    /**
     * @param $blogcategory_id
     * @return mixed
     */
    public function get($blogcategory_id)
    {
        return BlogCategory::find($blogcategory_id);
    }
    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        return BlogCategory::all();
    }


    /**
     * @param $blogcategory_id
     */
    public function delete($blogcategory_id)
    {
        $category = $this->get($blogcategory_id);

       /* $blogcat_id = null;
        if($category->blogcat_id != null)
            $blogcat_id = $category->blogcat_id;*/

        $category->remove();

       // return $blogcat_id;
    }

    /**
     * @param $blogcategory_id
     * @param object $blogcategory_data
     */
    public function update($blogcategory_id, object $blogcategory_data)
    {
        $category = BlogCategory::find($blogcategory_id);
        $category->update($blogcategory_data->all());

        return $category;
    }

    /**
     * @param object $blogcategory_data
     * @return mixed
     */
    public function store(object $blogcategory_data)
    {
        $category = BlogCategory::create($blogcategory_data->all());

        return $category;
    }
}
