<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryItem extends Model
{
    protected $fillable = [
        'title', 'type', 'meta', 'user_id'
    ];

    /**
     * Get History item owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
