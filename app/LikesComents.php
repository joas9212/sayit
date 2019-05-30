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

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeComentsOfUser($query, $coments_id, $user_id)
    {
        return $query->where('coments_id', $coments_id)->where('user_id', $user_id);
    }
}
