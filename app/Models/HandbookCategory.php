<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Kalnoy\Nestedset\NodeTrait;

class HandbookCategory extends Model
{
    use NodeTrait;

    protected $fillable = [
        'ru_title', 'en_title', 'uz_title', 'ru_slug', 'en_slug', 'uz_slug', 'parent_id'
    ];

    private static $UPLOAD_DIRECTORY = 'uploads/handbook_categories_images/';

    /**
     * Children categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function categories()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * Check if category has children
    */
    public function hasCategories()
    {
        return (isset($this->categories[0])) ? true: false;
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
        $image->storeAs(self::$UPLOAD_DIRECTORY, $filename);
        $this->saveImageName($filename);
    }

    /**
     * Generate filename for image
     *
     * @param string $imageName
     * @return string
    */
    public function generateFileName(string $imageName)
    {
        return str_random(20) . $imageName;
    }

    /**
     * Remove an image
     *
     * @return void
    */
    public function removeImage()
    {
        if ($this->image) {
            Storage::delete(self::$UPLOAD_DIRECTORY . $this->image);
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
}
