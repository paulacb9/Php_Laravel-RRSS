<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //use HasFactory;
    protected $table = 'images';

    // Relación One to Many
    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('id', 'desc');
    }

     // Relación One to Many
     public function likes(){
        return $this->hasMany(Like::class);
    }

    // Relacion Many to On
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
