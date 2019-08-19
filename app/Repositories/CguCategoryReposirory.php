<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 19.08.2019
 * Time: 21:57
 */

namespace App\Repositories;

use App\Models\CguCategory;

class CguCategoryRepository implements CguCategoryRepositoryInterface
{


    /**
     * @param $category_id
     * @return mixed
     */
    public function get($category_id)
    {
        return CguCategory::find($category_id);
    }

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        return CguCategory::orderBy('id', 'desc')->where('parent_id', 0)->get();
    }


    /**
     * @param $category_id
     */
    public function delete($category_id)
    {
        $category = CguCategory::find($category_id);
        $category->remove();
    }


    /**
     * @param $category_id
     * @param array $category_data
     */
    public function update($category_id, array $category_data)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param array $category_data
     * @return mixed|void
     */
    public function store(array $category_data)
    {
        // TODO: Implement store() method.
    }
}