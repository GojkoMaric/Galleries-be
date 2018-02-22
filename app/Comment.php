<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
