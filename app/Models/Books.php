<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'title','pages_count','annotation','cover_image','user_id','author_id'
    ];
}
