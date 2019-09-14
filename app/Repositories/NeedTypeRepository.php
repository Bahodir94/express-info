<?php


namespace App\Repositories;


use App\Models\NeedType;

class NeedTypeRepository implements NeedTypeRepositoryInterface
{

    /**
     * Get all types of needs
     *
     * @return array
     */
    public function all()
    {
        return NeedType::all();
    }

    /**
     * Get type of needs by it's ID
     *
     * @param int $id
     * @return NeedType
     */
    public function get($id)
    {
        return NeedType::findOrFail($id);
    }

    /**
     * Create a type of need
     *
     * @param \Illuminate\Http\Request $needTypeData
     * @return void
     */
    public function create($needTypeData)
    {
        NeedType::create($needTypeData->all());
    }

    /**
     * Update type of needs
     *
     * @param int $id
     * @param \Illuminate\Http\Request $needTypeData
     * @return void
     */
    public function update($id, $needTypeData)
    {
        $this->get($id)->update($needTypeData->all());
    }

    /**
     * Delete type of needs
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        NeedType::destroy($id);
    }

    /**
     * Get type of needs by slug
     *
     * @param string $slug
     * @return NeedType
     */
    public function getBySlug(string $slug)
    {
        $needType = NeedType::where('ru_slug', $slug)->first();
        abort_if(!$needType, 404);
        return $needType;
    }
}
