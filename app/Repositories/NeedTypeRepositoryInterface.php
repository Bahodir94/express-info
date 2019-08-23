<?php


namespace App\Repositories;


use App\Models\NeedType;

interface NeedTypeRepositoryInterface
{
    /**
     * Get all types of needs
     *
     * @return array
    */
    public function all();

    /**
     * Get type of needs by it's ID
     *
     * @param int $id
     * @return NeedType
     */
    public function get($id);

    /**
     * Create a type of need
     *
     * @param \Illuminate\Http\Request $needTypeData
     * @return void
    */
    public function create($needTypeData);

    /**
     * Update type of needs
     *
     * @param int $id
     * @param \Illuminate\Http\Request $needTypeData
     * @return void
    */
    public function update($id, $needTypeData);

    /**
     * Delete type of needs
     *
     * @param int $id
     * @return void
    */
    public function delete($id);
}
