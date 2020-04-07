<?php


namespace App\Repositories;

use App\Models\Tender;
use App\Models\TenderRequest;


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
        $user = auth()->user();
        if ($user) {
            $tenderData['client_name'] = $user->name;
            $tenderData['client_email'] = $user->email;
            $tenderData['client_phone_number'] = $user->phone_number || '';
            $tenderData['client_type'] = $user->customer_type;
            $tenderData['owner_id'] = $user->id;
        } else {
            $tenderData['client_name'] = $tenderData['firstName'] . ' ' . $tenderData['secondName'];
        }
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
        $tender = $this->get($id);
        $tender->update($data->all());
        $tender->saveFiles($data->file('files'));
        $tender->categories()->detach();
        foreach ($data->get('categories') as $categoryId) {
            $tender->categories()->attach($categoryId);
        }
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        Tender::destroy($id);
    }

    /**
     * @inheritDoc
     */
    public function get($id)
    {
        return Tender::findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function getBySlug(string $slug)
    {
        return Tender::where('slug', $slug)->first();
    }

    /**
     * @inheritDoc
     */
    public function createRequest($data)
    {
        return TenderRequest::create($data->all());
    }

    /**
     * @inheritDoc
     */
    public function cancelRequest($requestId)
    {
        TenderRequest::destroy($requestId);
    }
}
