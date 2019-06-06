<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'tags']; 
    public  $timestamps = false; 

    // touche pas
    public function user() {
        return $this->belongsTo(User::class);
    }
    // touche pas
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    
}
