<?php


namespace App\Repositories;

use App\Models\HandbookCategory;


class HandbookCategoryRepository implements HandbookCategoryRepositoryInterface
{

    /**
     * Get's a handbook category by it'id
     *
     * @param int $id
     * @return \App\Models\HandbookCategory
     */
    public function get(int $id)
    {
        return HandbookCategory::find($id);
    }

    /**
     * Gets all handbook categories
     *
     * @return mixed
     */
    public function all()
    {
        return HandbookCategory::where('parent_id', null)->orderBy('id', 'desc')->get();
    }

    /**
     * Delete a handbook category
     *
     * @param int $id
     * @return int
     * @throws \Exception
     */
    public function delete(int $id)
    {
        $category = $this->get($id);
        $parentId = $category->getParentId();
        $category->delete();
        return $parentId;
    }

    /**
     * Update a handbook category
     *
     * @param int $categoryId
     * @param object $categoryData
     * @return \App\Models\HandbookCategory
     */
    public function update(int $categoryId, $categoryData)
    {
        $category = $this->get($categoryId);
        $category->update($categoryData->all());
        $category->uploadImage($categoryData->file('image'));
        return $category;
    }

    /**
     * Store a handbook category
     *
     * @param object $categoryData
     * @return \App\Models\HandbookCategory
     */
    public function store($categoryData)
    {
        $category = HandbookCategory::create($categoryData->all());
        $category->uploadImage($categoryData->file('image'));

        $parentId = $categoryData->get('parent_id');

        if ($parentId != 0)
        {
            $parent = $this->get($parentId);
            $category->appendToNode($parent)->save();
        }

        return $category;
    }

    /**
     * Get tree of handbook categories
     *
     * @return object
     */
    public function getTree()
    {
        return HandbookCategory::all()->toTree();
    }

    /**
     * Set position for category
     *
     * @param int $categoryId
     * @param int $position
     * @return bool
     */
    public function setPosition(int $categoryId, int $position)
    {
        $category = $this->get($categoryId);
        $category->position = $position;
        return $category->save();
    }
}
