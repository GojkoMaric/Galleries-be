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
        return self::with('user')->with('picture')->get();
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public static function search($term)
    {
        return self::with('user')
        ->with('picture')
        ->where('name', 'LIKE', '%'.$term.'%')
        ->orWhere('description', 'LIKE', '%'.$term.'%')
        ->get();
        // ->orWhere('user->first_name', 'LIKE', '%'.$term.'%')
    }

    public function picture(){
        return $this->hasMany(Picture::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
  
}
