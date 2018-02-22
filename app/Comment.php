<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    public function gallery(){
        return $this->belongsTo('App\Gallery', 'gallery_id', 'id');
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
