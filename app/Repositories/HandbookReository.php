<?php


namespace App\Repositories;


use App\Models\Handbook;

class HandbookReository implements HandbookRepositoryInterface
{

    /**
     * All handbooks
     *
     * @return mixed
     */
    public function all()
    {
        return Handbook::orderBy('position', 'asc')->get();
    }

    /**
     * Get handbook by id
     *
     * @param int $handbookId
     * @return Handbook
     */
    public function get(int $handbookId)
    {
        return Handbook::find($handbookId);
    }

    /**
     * Create a handbook
     *
     * @param \Illuminate\Http\Request $handbookData
     * @return Handbook
     */
    public function create($handbookData)
    {
        $handbook = Handbook::crete($handbookData->all());
        $handbook->uploadImage($handbookData->file('image'));
        return $handbook;
    }

    /**
     * Update a handbook
     *
     * @param int $handbookId
     * @param \Illuminate\Http\Request $handbookData
     * @return Handbook
     */
    public function update(int $handbookId, $handbookData)
    {
        $handbook = $this->get($handbookId);
        $handbook->update($handbookData->all());
        $handbook->uploadImage($handbookData->file('image'));
        return $handbook;
    }

    /**
     * Set position for handbook
     *
     * @param int $handbookId
     * @param int $position
     * @return boolean
     */
    public function setPosition(int $handbookId, int $position)
    {
        $handbook = $this->get($handbookId);
        $handbook->position = $position;
        return $handbook->save();
    }

    /**
     * Delete handbook
     *
     * @param int $handbookId
     * @return mixed Parent Category
     * @throws \Exception
     */
    public function delete(int $handbookId)
    {
        $handbook = $this->get($handbookId);
        $category = $handbook->category;
        $handbook->delete();
        return $category;
    }
}
