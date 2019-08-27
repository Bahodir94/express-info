<?php


namespace App\Repositories;


use App\Models\Company;
use App\Models\NeedType;
use App\Models\Service;

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
     * @param int $companyId
     * @return Company
     */
    public function get(int $companyId)
    {
        return Company::find($companyId);
    }

    /**
     * Create a company
     *
     * @param \Illuminate\Http\Request $companyData
     * @return Company
     */
    public function create($companyData)
    {
        $company = Company::create($companyData->all());
        $company->uploadImage($companyData->file('image'));
        $services = $companyData->get('services');
        $company->services()->attach($services);
        return $company;
    }

    /**
     * Update a company
     *
     * @param int $companyId
     * @param \Illuminate\Http\Request $companyData
     * @return Company
     */
    public function update(int $companyId, $companyData)
    {
        $company = $this->get($companyId);
        $company->update($companyData->all());
        $company->uploadImage($companyData->file('image'));
        $company->services()->detach();
        $services = $companyData->get('services');
        $company->services()->attach($services);
        return $company;
    }

    /**
     * Set position for company
     *
     * @param int $companyId
     * @param int $position
     * @return boolean
     */
    public function setPosition(int $companyId, int $position)
    {
        $company = $this->get($companyId);
        $company->position = $position;
        return $company->save();
    }

    /**
     * Delete company
     *
     * @param int $companyId
     * @return mixed Parent Category
     * @throws \Exception
     */
    public function delete(int $companyId)
    {
        $company = $this->get($companyId);
        $category = $company->category;
        $company->delete();
        return $category;
    }
}
