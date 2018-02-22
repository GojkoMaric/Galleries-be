<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'images_url', 'gallery_id'
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }
}
