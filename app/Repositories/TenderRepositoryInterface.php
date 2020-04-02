<?php


namespace App\Repositories;

interface TenderRepositoryInterface
{
    /**
     * Get all tenders with no order
     * @return mixed
     */
    public function all();

    /**
     * Get all tenders ordered by created at field
     * @return mixed
     */
    public function allOrderedByCreatedAt();

    /**
     * Create a new tender
     *
     * @param \Illuminate\Http\Request $data
     * @return \App\Models\Tender
     */
    public function create($data);

    /**
     * Update a tender
     *
     * @param int $id
     * @param \Illuminate\Http\Request $data
     * @return void
     */
    public function update($id, $data);

    /**
     * Delete a tender
     *
     * @param int $id
     * @return void
     */
    public function delete($id);

    /**
     * Get a tender by id
     *
     * @param $id
     * @return \App\Models\Tender
     */
    public function get($id);

    /**
     * Get a tender by slug
     *
     * @param $slug
     * @return \App\Models\Tender
     */
    public function getBySlug();
}
