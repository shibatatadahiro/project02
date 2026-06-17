<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'user_id',
        'evaluation',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}