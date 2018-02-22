<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public $timestamps = false;

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }
}
