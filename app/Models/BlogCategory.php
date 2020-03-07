<?php

namespace App\Models;

use App\Models\Components\Slug;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use Slug;

    protected $fillable = [
        'ru_title', 'en_title', 'uz_title',
        'ru_slug', 'en_slug', 'uz_slug',
        'meta_title', 'meta_description', 'meta_keywords'
    ];

    /**
     * Возвращаем очищенный заголовок
     *
     * @return string
     */
    public function getTitle()
    {
        return strip_tags($this->ru_title);
    }

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'ru_slug' => [
                'source' => 'ru_title'
            ],
            'en_slug' => [
                'source' => 'en_title'
            ],
            'uz_slug' => [
                'source' => 'uz_title'
            ],
        ];
    }
}
