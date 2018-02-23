<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{

    public function index()
    {
        return Comment::all();
    }

    public function store(Request $request)
    {
        $comment = Comment::create([
			'content' => $request['content'],
			'gallery_id' => $request['gallery_id'],
			'user_id' => $request['user_id']
		]);
		return Comment::with('user')->where('gallery_id', $comment['gallery_id'])->get();
    }
    
    public function show($id)
    {
        return Comment::where('gallery_id', $id)->with('user')->get();
    }

    

}
