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
}
