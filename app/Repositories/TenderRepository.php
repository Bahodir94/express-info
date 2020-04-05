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
        $tenderData = $data->all();
        $tenderData['client_name'] = $tenderData['firstName'] . ' ' . $tenderData['secondName'];
        $tender = Tender::create($tenderData);
        $tender->saveFiles($data->file('files'));
        foreach ($data->get('categories') as $categoryId)
            $tender->categories()->attach($categoryId);
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
