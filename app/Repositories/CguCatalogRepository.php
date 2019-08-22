<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 22.08.2019
 * Time: 10:40
 */

namespace App\Repositories;


use App\Models\CguCatalog;
use App\Models\CguCategory;

class CguCatalogRepository implements CguCatalogRepositoryInterface
{

    /**
     * Get's a catalog by it's ID
     *
     * @param int
     */
    public function get($category_id)
    {
        // TODO: Implement get() method.
    }

    /**
     * Get's all catalogs.
     *
     * @return mixed
     */
    public function all()
    {
        return CguCatalog::orderBy('id', 'desc')->get();
    }

    /**
     * Deletes a catalog.
     *
     * @param int
     */
    public function delete($category_id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Updates a catalog.
     *
     * @param int
     * @param object $category_data
     */
    public function update($category_id, object $category_data)
    {
        // TODO: Implement update() method.
    }

    /**
     * Store a catalog
     *
     * @param object $category_data
     * @return mixed
     */
    public function store(object $category_data)
    {
        // TODO: Implement store() method.
    }

    public function getTree()
    {
        return CguCategory::all()->toTree();
    }
}