<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'tags']; 
}
