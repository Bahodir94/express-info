<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Kalnoy\Nestedset\NodeTrait;

class HandbookCategory extends Model
{
    use NodeTrait;

    protected $fillable = [
        'ru_title', 'en_title', 'uz_title', 'ru_slug', 'en_slug', 'uz_slug', 'parent_id',
        'need_id'
    ];

    const UPLOAD_DIRECTORY = 'uploads/handbook_categories_images/';

    /**
     * Children categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function categories()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('position', 'asc');
    }

    /**
     * Check if category has children
    */
    public function hasCategories()
    {
        return isset($this->categories[0]);
    }

    /**
     * Parent category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parentCategory()
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }

    /**
     * Check if category has parent category
     *
     * @return boolean
    */
    public function hasParentCategory()
    {
        return $this->parentCategory !== null;
    }

    /**
     * Category's handbooks
     *
     * @return mixed
    */
    public function companies()
    {
        return $this->hasMany(Company::class, 'category_id', 'id')->orderBy('position', 'asc');
    }

    /**
     * Check if category has handbooks
     *
     * @return boolean
    */
    public function hasCompanies()
    {
        return isset($this->companies[0]);
    }

    /**
     * Get type of need for this category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function needType()
    {
        return $this->hasOne(NeedType::class, 'id', 'need_id');
    }

    /**
     * Category's services
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function services()
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }

    /**
     * Upload an image and save it in file storage
     *
     * @param $image
    */
    public function uploadImage($image)
    {
        if (!$image) return;

        $this->removeImage();
        $filename = $this->generateFileName($image->extension());
        $image->storeAs(self::UPLOAD_DIRECTORY, $filename);
        $this->saveImageName($filename);
    }

    /**
     * Generate filename for image
     *
     * @param string $imageName
     * @return string
    */
    private function generateFileName(string $imageName)
    {
        return str_random(20) . $imageName;
    }

    /**
     * Get image filename
     *
     * @return string
    */
    public function getImage()
    {
        if ($this->image)
            return '/' . self::UPLOAD_DIRECTORY . $this->image;
        else
            return '';
    }

    /**
     * Remove an image
     *
     * @return void
    */
    public function removeImage()
    {
        if ($this->image) {
            Storage::delete(self::UPLOAD_DIRECTORY . $this->image);
        }
    }

    /**
     * Save an image name to the database
     *
     * @param string $imageName
     * @return void
    */
    private function saveImageName(string $imageName)
    {
        $this->image = $imageName;
        $this->save();
    }

    /**
     * Override delete method to delete image too
     *
     * @return void
     * @throws \Exception
     */
    public function delete()
    {
        $this->removeImage();
        parent::delete();
    }

    /**
     * Get cleand title
     *
     * @return string
     */
    public function getTitle()
    {
        return strip_tags($this->ru_title);
    }
}
