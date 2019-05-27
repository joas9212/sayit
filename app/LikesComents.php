<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikesComents extends Model
{
	protected $table = 'likes_coments';
    //
    protected $fillable = [
        'id', 'user_id', 'coments_id'
    ];

    public function coment(){
        return $this->belongsTo('App\Coments');
    }

}
