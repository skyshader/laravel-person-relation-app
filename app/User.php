<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Tag;

class User extends Model
{
    protected $fillable = ['name'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_user', 'user_id', 'tag_id');
    }

    public function relatives()
    {
        return $this->belongsToMany('App\User', 'tag_user', 'user_id', 'relative_id');
    }

    public function getTag($user)
    {
    	$tag_user = DB::table('tag_user')
                		->where('user_id', $user->id)
                		->where('relative_id', $this->id)
                		->pluck('tag_id');
        return Tag::find($tag_user[0]);
    }
}
