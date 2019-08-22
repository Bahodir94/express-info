<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $fillable = [
        'ru_title', 'uz_title', 'en_title',
        'ru_description', 'uz_description', 'en_description',
        'url', 'user_id', 'active', 'phone_number', 'geo_location', 'logo_url', 'category_id'
    ];

    private static $UPLOAD_DIRECTORY = 'uploads/companies/';

    public function category()
    {
        return $this->hasOne(HandbookCategory::class, 'id', 'category_id');
    }

    /**
     * User clicks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userClicks()
    {
        return $this->hasMany(UserClick::class, 'company_id', 'id');
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
            return '/' . self::$UPLOAD_DIRECTORY . $this->image;
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
