<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tender extends Model
{
    const UPLOAD_DIRECTORY = 'uploads/tenders/';

    protected $fillable = [
        'client_type', 'client_name', 'client_email', 'client_phone_number', 'client_company_name', 'client_site_url',
        'title', 'description', 'budget', 'deadline',
        'target_audience', 'links', 'additional_info', 'other_info', 'what_for', 'type',
        'slug', 'opened',
        'need_id'
    ];

    /**
     * Type of need
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function need()
    {
        return $this->hasOne(NeedType::class, 'id', 'need_id');
    }

    public function files()
    {
        return $this->hasMany(TenderFile::class, 'tender_id', 'id');
    }

    /**
     * Tender's attached categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(HandbookCategory::class, 'tender_category',
            'tender_id', 'category_id');
    }

    public function saveFiles($files)
    {
        if (count($files) == 0)
            return;
        $this->files()->delete();
        foreach ($files as $file) {
            $filename = Str::random(20) . '.' . $file->extension();
            $file->storeAs(self::UPLOAD_DIRECTORY, $filename);
            $this->files()->create([
                'path' => $filename
            ]);
        }
    }
}
