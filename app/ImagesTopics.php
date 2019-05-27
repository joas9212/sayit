<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesTopics extends Model
{
	protected $table = 'images_topics';
    //
    protected $fillable = [
        'id', 'path', 'topics_id'
    ];

    public function topic(){
        return $this->belongsTo('App\Topics');
    }
}
