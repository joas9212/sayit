<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikesTopics extends Model
{
	protected $table = 'likes_topics';
    //
    protected $fillable = [
        'id', 'user_id', 'topics_id'
    ];

    public function topic(){
        return $this->belongsTo('App\Topics');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeTopicsOfUser($query, $topics_id, $user_id)
    {
        return $query->where('topics_id', $topics_id)->where('user_id', $user_id);
    }
}
