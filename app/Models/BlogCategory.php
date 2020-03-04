<?php

namespace App;

use App\Models;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Kalnoy\Nestedset\NodeTrait;

class BlogCategory extends Model
{
    use NodeTrait;

    protected $fillable = [
        'ru_title', 'en_title', 'uz_title',
        'ru_slug', 'en_slug', 'uz_slug'
    ];

    /**
     * Возвращает дочерние объекты категории
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(self::class);
    }

    /**
     * Проверяет есть ли дочерние категории или нет
     *
     * @return bool
     */
    public function hasCategories()
    {
        return (isset($this->categories[0])) ? true : false;
    }

    /**
     * @return bool
     */
    public function hasParentCategory()
    {
        return ($this->parentCategory != null) ? true : false;
    }

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
     * Создает слаг для русского языка если не ввели слаг
     *
     * @param $title
     */
    public function createRuSlug($title)
    {
        $this->ru_slug = SlugService::createSlug(BlogCategory::class, 'ru_slug', $title);
    }

    /**
     * Создает слаг для английского языка если не ввели слаг
     *
     * @param $title
     */
    public function createEnSlug($title)
    {
        $this->en_slug = SlugService::createSlug(BlogCategory::class, 'en_slug', $title);
    }

    /**
     * Создает слаг для узбекского языка если не ввели слаг
     *
     * @param $title
     */
    public function createUzSlug($title)
    {
        $this->uz_slug = SlugService::createSlug(BlogCategory::class, 'uz_slug', $title);
    }

    /**
     * @param $title
     */
    public function saveRuSlug($title)
    {
        $this->ru_slug = $title;
        $this->save();
    }

    /**
     * @param $title
     */
    public function saveEnSlug($title)
    {
        $this->en_slug = $title;
        $this->save();
    }

    /**
     * @param $title
     */
    public function saveUzSlug($title)
    {
        $this->uz_slug= $title;
        $this->save();
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
