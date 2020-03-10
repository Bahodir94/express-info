<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqGroup extends Model
{
    protected $fillable = [
        'ru_content', 'uz_content', 'en_content',
        'ru_title', 'en_title', 'uz_title',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, 'faq_id', 'id');
    }
}
