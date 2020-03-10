<?php


namespace App\Repositories;


use App\Models\FaqGroup;
use Illuminate\Database\Eloquent\Collection;

class FaqRepository implements FaqRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function all()
    {
        return FaqGroup::all();
    }

    /**
     * @inheritDoc
     */
    public function get(int $faqId)
    {
        return FaqGroup::findOrFail($faqId);
    }

    /**
     * @inheritDoc
     */
    public function create($faqData)
    {
        return FaqGroup::create($faqData->all());
    }

    /**
     * @inheritDoc
     */
    public function update(int $faqId, $faqData)
    {
        $faq = $this->get($faqId);
        $faq->update($faqData->all());
        return $faq;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $faqId)
    {
        FaqGroup::destroy($faqId);
    }
}
