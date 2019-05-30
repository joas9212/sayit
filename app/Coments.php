<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coments extends Model
{
	protected $table = 'coments';
    //
    protected $fillable = [
        'id', 'coment', 'user_id', 'topics_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function images(){
        return $this->hasMany('App\ImagesComents');
    }

    public function likes(){
        return $this->hasMany('App\LikesComents');
    }
    
    public function topic(){
        return $this->belongsTo('App\Topics');
    }
}
