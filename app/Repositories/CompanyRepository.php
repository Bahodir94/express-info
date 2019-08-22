<?php


namespace App\Repositories;


use App\Models\Company;

class CompanyRepository implements CompanyRepositoryInterface
{

    /**
     * All handbooks
     *
     * @return mixed
     */
    public function all()
    {
        return Company::orderBy('position', 'asc')->get();
    }

    /**
     * Get company by id
     *
     * @param int $handbookId
     * @return Company
     */
    public function get(int $handbookId)
    {
        return Company::find($handbookId);
    }

    /**
     * Create a company
     *
     * @param \Illuminate\Http\Request $handbookData
     * @return Company
     */
    public function create($handbookData)
    {
        $handbook = Company::create($handbookData->all());
        $handbook->uploadImage($handbookData->file('image'));
        return $handbook;
    }

    /**
     * Update a company
     *
     * @param int $handbookId
     * @param \Illuminate\Http\Request $handbookData
     * @return Company
     */
    public function update(int $handbookId, $handbookData)
    {
        $handbook = $this->get($handbookId);
        $handbook->update($handbookData->all());
        $handbook->uploadImage($handbookData->file('image'));
        return $handbook;
    }

    /**
     * Set position for company
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
     * Delete company
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
