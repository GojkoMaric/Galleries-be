<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    // protected $casts = [
    //     'images_url' => 'array'
    //   ];


    public static function getAllGalleries(){
        return self::with('user')->get();
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public static function search($term)
    {
        return self::where('name', 'LIKE', '%'.$term.'%')->get();
    }


  
}
