<?php

namespace App\Models;

use App\Models\Components\Image;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use Image;

    protected $fillable = [
        'ru_title', 'en_title', 'uz_title', 'need_id'
    ];

    const UPLOAD_DIRECTORY = 'uploads/menu_items_images/';

    /**
     * Type of need
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function needType()
    {
        return $this->hasOne(NeedType::class, 'id', 'need_id');
    }

    /**
     * Categories for this menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->belongsToMany(HandbookCategory::class, 'categories_menus', 'menu_id', 'category_id');
    }

    /**
     * Get array of attached categories ids
     *
     * @return array
     */
    public function getCategoriesIdsAsArray()
    {
        return $this->categories()->pluck('handbook_categories.id')->toArray();
    }

    public function delete()
    {
        $this->removeImage();
        return parent::delete();
    }
}
