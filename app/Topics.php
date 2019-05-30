<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
	protected $table = 'topics';
    //
    protected $fillable = [
        'id', 'topic', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function images(){
        return $this->hasMany('App\ImagesTopics');
    }

    public function likes(){
        return $this->hasMany('App\LikesTopics');
    }

    public function coments(){
        return $this->hasMany('App\Coments');
    }

    public function scopeName($query, $name)
    {
        return $query->where('topic', 'like' , '%'.$name.'%');
    }
}
