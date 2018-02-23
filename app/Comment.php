<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    protected $fillable = [
		'content', 'gallery_id', 'user_id',
	];

    public function gallery(){
        return $this->belongsTo('App\Gallery', 'gallery_id', 'id');
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
