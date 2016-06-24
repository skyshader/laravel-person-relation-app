<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function relatives()
    {
        return $this->belongsToMany('App\User', 'tag_user', 'user_id', 'relative_id');
    }
}
