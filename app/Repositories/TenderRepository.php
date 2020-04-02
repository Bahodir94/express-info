<?php


namespace App\Repositories;

use App\Models\Tender;


class TenderRepository implements TenderRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function all()
    {
        return Tender::all();
    }

    /**
     * @inheritDoc
     */
    public function allOrderedByCreatedAt()
    {
        return Tender::orderBy('created_at', 'desc')->get();
    }

    /**
     * @inheritDoc
     */
    public function create($data)
    {
        $tender = Tender::create($data->all());
        $tender->saveFiles($data->file('files'));
        return $tender;
    }

    /**
     * @inheritDoc
     */
    public function update($id, $data)
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritDoc
     */
    public function get($id)
    {
        // TODO: Implement get() method.
    }

    /**
     * @inheritDoc
     */
    public function getBySlug()
    {
        // TODO: Implement getBySlug() method.
    }
}
