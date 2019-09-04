<?php
namespace App\Repositories;

use App\Models\MenuItem;

interface MenuRepositoryInterface {
    /**
     * Get Menu item by id
     * 
     * @param int $id
     * @return MenuItem
     */
    public function get(int $id);

    /**
     * Create a menu item
     *
     * @param \Illuminate\Http\Request $menuData
     */
    public function create($menuData);

    /**
     * Update a menu item
     *
     * @param int $id
     * @param \Illuminate\Http\Request $menuData
    */
    public function update(int $id, $menuData);

    /**
     * Delete a menu item
     *
     * @param int $id
    */
    public function delete(int $id);
}
