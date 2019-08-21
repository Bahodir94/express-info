<?php


namespace App\Repositories;


use phpDocumentor\Reflection\Types\Void_;

interface HandbookCategoryRepositoryInterface
{
    /**
     * Get's a handbook category by it'id
     *
     * @param int $id
     * @return \App\Models\HandbookCategory
    */
    public function get(int $id);

    /**
     * Gets all handbook categories
     *
     * @return mixed
    */
    public function all();

    /**
     * Delete a handbook category
     *
     * @param int $id
     * @return int
    */
    public function delete(int $id);

    /**
     * Update a handbook category
     *
     * @param int $categoryId
     * @param object $categoryData
     * @return \App\Models\HandbookCategory
    */
    public function update(int $categoryId, $categoryData);

    /**
     * Store a handbook category
     *
     * @param object $categoryData
     * @return \App\Models\HandbookCategory
    */
    public function store($categoryData);

    /**
     * Get tree of handbook categories
     *
     * @return object
    */
    public function getTree();

    /**
     * Set position for category
     *
     * @param int $categoryId
     * @param int $position
     * @return void
    */
    public function setPosition(int $categoryId, int $position);
}
