<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Kalnoy\Nestedset\NodeTrait;

class CguCategory extends Model
{
    use NodeTrait;

    protected $fillable = [
        'ru_title', 'en_title', 'uz_title'
    ];

    public function uploadImage($image)
    {
        if($image == null) return;

        $this->removeImage();
        $filename = $this->generateFileName($image->extension());
        $image->storeAs('uploads/cgu_categories_image', $filename);
        $this->saveImageName();
    }

    public function generateFileName($ext)
    {
        return str_random(20) . $ext;
    }

    public function removeImage()
    {
        if($this->image != null)
        {
            Storage::delete('uploads/cgu_categories_image/' . $this->image);
        }
    }

    public function saveImageName($name)
    {
        $this->image = $name;
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }
}
