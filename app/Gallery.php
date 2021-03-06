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
        return self::with(['user','picture', 'comments'])->get();
        // ->join('comment', 'gallery.comment_id', '=', 'comment.id')
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public static function search($term)
    {
        return self::with(['user','picture', 'comments'])
        // ->with('picture')
        ->where('name', 'LIKE', '%'.$term.'%')
        ->orWhere('description', 'LIKE', '%'.$term.'%')
        ->get();
        // ->orWhere('user->first_name', 'LIKE', '%'.$term.'%')
    }

    public function picture(){
        return $this->hasMany(Picture::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
  
}
