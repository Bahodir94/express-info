<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Kalnoy\Nestedset\NodeTrait;

class CguCategory extends Model
{
    use NodeTrait;

    protected $fillable = [
        'ru_title', 'en_title', 'uz_title', 'ru_slug', 'en_slug', 'uz_slug', 'parent_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('id', 'desc');
    }


    /**
     * @return bool
     */
    public function hasCategories()
    {
        return (isset($this->categories[0])) ? true : false;
    }

    /**
     * Загружает изображение на сервер и сохраняет в базе
     *
     * @param $image
     */
    public function uploadImage($image)
    {
        if($image == null) return;

        $this->removeImage();
        $filename = $this->generateFileName($image->extension());
        $image->storeAs('uploads/cgu_categories_image', $filename);
        $this->saveImageName();
    }

    /**
     * Создаёт название файла
     *
     * @param $ext
     * @return string
     */
    public function generateFileName($ext)
    {
        return str_random(20) . $ext;
    }

    /**
     *Удаляет изображение
     */
    public function removeImage()
    {
        if($this->image != null)
        {
            Storage::delete('uploads/cgu_categories_image/' . $this->image);
        }
    }

    /**
     * Сохраняет имя файла в базу
     *
     * @param $name
     */
    public function saveImageName($name)
    {
        $this->image = $name;
        $this->save();
    }

    /**
     * Удаляем картину и сам объект
     *
     * @throws \Exception
     */
    public function remove()
    {
        $this->removeImage();
        $this->delete();
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
        $this->ru_slug = SlugService::createSlug(CguCategory::class, 'ru_slug', $title);
    }

    /**
     * Создает слаг для английского языка если не ввели слаг
     *
     * @param $title
     */
    public function createEnSlug($title)
    {
        $this->en_slug = SlugService::createSlug(CguCategory::class, 'en_slug', $title);
    }

    /**
     * Создает слаг для узбекского языка если не ввели слаг
     *
     * @param $title
     */
    public function createUzSlug($title)
    {
        $this->uz_slug = SlugService::createSlug(CguCategory::class, 'uz_slug', $title);
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
