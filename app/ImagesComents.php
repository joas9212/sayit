<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesComents extends Model
{
	protected $table = 'images_coments';
    //
    protected $fillable = [
        'id', 'path', 'topics_id'
    ];

    public function coment(){
        return $this->belongsTo('App\Coments');
    }
}
