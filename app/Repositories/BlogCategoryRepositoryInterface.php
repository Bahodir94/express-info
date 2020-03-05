<?php

namespace App\Repositories;
//use Your Model

/**
 * Class BlogCategoryRepositoryInterface.
 */
interface BlogCategoryRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function get($blogcategory_id);

    public function all();

    public function delete($blogcategory_id);

    public function update($blogcategory_id, $blogcategory_data);

    public function store($blogcategory_data);

}
