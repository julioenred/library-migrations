<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'description',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
