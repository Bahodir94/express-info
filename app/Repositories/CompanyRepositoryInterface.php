<?php


namespace App\Repositories;


use App\Models\Handbook;

interface CompanyRepositoryInterface
{
    /**
     * All handbooks
     *
     * @return mixed
    */
    public function all();

    /**
     * Get handbook by id
     *
     * @param int $handbookId
     * @return Handbook
    */
    public function get(int $handbookId);

    /**
     * Create a handbook
     *
     * @param \Illuminate\Http\Request $handbookData
     * @return Handbook
    */
    public function create($handbookData);

    /**
     * Update a handbook
     *
     * @param int $handbookId
     * @param \Illuminate\Http\Request $handbookData
     * @return Handbook
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
}
