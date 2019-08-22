<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CguCatalog extends Model
{
    const UPLOAD_FILE_LENGTH = 20;
    const UPLOAD_FILE_DIRECTORY = 'uploads/cgu_catalogs_files/';

    protected $fillable = [
        'ru_title', 'en_title', 'uz_title',
        'ru_description', 'en_description', 'uz_description',
        'link', 'active', 'category_id',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(CguCategory::class, 'id', 'category_id');
    }

    /**
     * @return bool
     */
    public function hasParentCategory()
    {
        return ($this->parentCategory != null) ? true : false;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return strip_tags($this->ru_title);
    }

    /**
     * @param $file
     */
    public function uploadFile($file)
    {
        if($file == null) return;

        $this->removeImaage();
        $filename = $this->generateFilename($file->extension());
        $file->storeAs(self::UPLOAD_FILE_DIRECTORY, $filename);
        $this->saveFileName($filename);
    }

    /**
     * @param $ext
     * @return string
     */
    public function generateFilename($ext)
    {
        return str_random(self::UPLOAD_FILE_LENGTH . '.' .$ext);
    }

    /**
     * @param $filemame
     */
    public function saveFileName($filemame)
    {
        $this->file = $filemame;
        $this->save();
    }

    public function removeImage()
    {
        if($this->file != null)
        {
            Storage::delete(self::UPLOAD_FILE_DIRECTORY, $this->file);
        }
    }

    public function getFileType()
    {
        if($this->file != null)
        {
            if(File::exists(public_path() . '/' . self::UPLOAD_FILE_DIRECTORY . $this->file))
                return File::mimeType(public_path() . '/' . self::UPLOAD_FILE_DIRECTORY . $this->file);
            else
                return null;
        }else
        {
            return null;
        }
    }

    /**
     * @return false|null|string
     */
    public function getFileSize()
    {
        if($this->file != null)
        {
            if(File::exists(public_path() . '/' . self::UPLOAD_FILE_DIRECTORY . $this->file))
                return File::mimeType(public_path() . '/' . self::UPLOAD_FILE_DIRECTORY . $this->file);
            else
                return null;
        }else
        {
            return null;
        }
    }

    /**
     * @return null|string
     */
    public function getFileUrl()
    {
        if($this->file != null)
            return '/' . self::UPLOAD_FILE_DIRECTORY . $this->file;
        else
            return null;
    }

    public function getActiveRender()
    {
        if($this->active)
        {
            return "<i class='text-success'>Active</i>";
        }else{
            return "<i class='text-danger'>Not active</i>";
        }
    }
}
