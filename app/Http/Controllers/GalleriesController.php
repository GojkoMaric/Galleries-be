<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\User;
use App\Picture;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $take = request()->input('take');
        $term = request()->input('term');
        if ($term) {
            return Gallery::search($term)->take($take);
        } else {
            return Gallery::getAllGalleries()->take($take);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //MovieRequest
        // return Gallery::create($request->all());

        $gallery = Gallery::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'images_url' => $request['images_url'],
            'user_id' => $request['user_id'],
            'created_at' => $request['created_at']
        ]);
        $image_url= Picture::create([
            'images_url' => $request['images_url'],
            'gallery_id' => $gallery->id
        ]);
        return Gallery::with('user')->where('user_id', $gallery['user_id'])->get();
		// return Gallery::with('user')->where('gallery_id', $gallery['gallery_id'])->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Gallery::getAllGalleries()->find($id);
    }

    public function showUserId($id)
    {
        $take = request()->input('take');
        return Gallery::where('user_id', $id)
        ->with(['user', 'picture', 'comments'])->take($take)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->all());
        return $gallery;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyGallery = Gallery::destroy($id);
        return Gallery::with('user')->where('id', $id)->get();
    }
}
