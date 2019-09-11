<?php


namespace App\Repositories;


use App\Models\Company;

interface CompanyRepositoryInterface
{
    /**
     * All handbooks
     *
     * @param mixed $paginate
     * @return array
    */
    public function all($paginate=null);

    /**
     * Get handbook by id
     *
     * @param int $handbookId
     * @return Company
    */
    public function get(int $handbookId);

    /**
     * Create a handbook
     *
     * @param \Illuminate\Http\Request $handbookData
     * @return Company
    */
    public function create($handbookData);

    /**
     * Update a handbook
     *
     * @param int $handbookId
     * @param \Illuminate\Http\Request $handbookData
     * @return Company
    */
    public function update(int $handbookId, $handbookData);

    /**
     * Set position for handbook
     *
     * @param int $handbookId
     * @param int $position
     * @return boolean
    */
    public function setPosition(int $handbookId, int $position);

    /**
     * Delete handbook
     *
     * @param int $handbookId
     * @return int
    */
    public function delete(int $handbookId);

    /**
     * Seacrh company by name
     * 
     * @param string $query
     * @return array
    */
    public function search(string $query, $paginate=None);
}
