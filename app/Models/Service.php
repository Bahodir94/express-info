<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'ru_title', 'en_title', 'uz_title', 'category_id'
    ];

    /**
     * Get all companies
    */
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    /**
     * Category for service
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function category()
    {
        return $this->hasOne(HandbookCategory::class, 'id', 'category_id');
    }
}
