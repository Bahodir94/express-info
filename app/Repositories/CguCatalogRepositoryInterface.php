<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 21.08.2019
 * Time: 13:40
 */

namespace App\Repositories;


interface CguCatalogRepositoryInterface
{
    /**
     * Get's a category by it's ID
     *
     * @param int
     */
    public function get($category_id);

    /**
     * Get's all categories.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a category.
     *
     * @param int
     */
    public function delete($category_id);

    /**
     * Updates a category.
     *
     * @param int
     * @param object $category_data
     */
    public function update($category_id, object $category_data);


    /**
     * Store a category
     *
     * @param object $category_data
     * @return mixed
     */
    public function store(object $category_data);
}