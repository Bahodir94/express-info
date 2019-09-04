<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeedType extends Model
{
    protected $fillable = [
        'ru_title', 'uz_title', 'en_title'
    ];

    /**
     * Get all companies for this need type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class, 'need_id', 'id');
    }

    /**
     * Menu Items for this type of
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function menuItems()
    {
        return $this->hasMany(\MenuItem::class, 'need_id', 'id');
    }
}
