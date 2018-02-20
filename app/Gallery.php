<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $timestamps = false;

    protected $casts = [
        'images_url' => 'array'
      ];

    public function users(){
        return $this->belongsTo(User::class);
    }
  
}
