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

    public function store()
    {
        return Comment::create($request->all());
    }
    

}
