<?php


namespace App\Repositories;


use App\Models\MenuItem;

class MenuRepository implements MenuRepositoryInterface
{

    /**
     * Get Menu item by id
     *
     * @param int $id
     * @return MenuItem
     */
    public function get(int $id)
    {
        return MenuItem::findOrFail($id);
    }

    /**
     * Create a menu item
     *
     * @param \Illuminate\Http\Request $menuData
     */
    public function create($menuData)
    {
        $newMenuItem = MenuItem::create($menuData->all());
        $newMenuItem->uploadImage($menuData->file('image'));
    }

    /**
     * Update a menu item
     *
     * @param int $id
     * @param \Illuminate\Http\Request $menuData
     */
    public function update(int $id, $menuData)
    {
        $menuItem = $this->get($id);
        $menuItem->update($menuData->all());
        $menuItem->uploadImage($menuData->file('image'));
    }

    /**
     * Delete a menu item
     *
     * @param int $id
     * @throws \Exception
     */
    public function delete(int $id)
    {
        $menuItem = $this->get($id);
        $menuItem->delete();
    }
}
