<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title','pages_count','annotation','cover_image','user_id','authors_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function authors()
    {
        return $this->hasMany(Authors::class);
    }
}
