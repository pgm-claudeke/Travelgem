<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false; 

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function posts() 
    {
        return $this->belongsToMany(Post::class);
    }
}
