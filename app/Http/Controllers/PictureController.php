<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PictureRequest;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PictureRequest $request)
    {
        $file = $request->file('image');
        $path = $file->storeAs('collection', $file->getClientOriginalName(), 'public');
        list($width, $height) = getimagesize(storage_path('app/public') . "/{$path}");

        $location = Storage::url($path);

        $place_id = intval($request->input('place_id'));

        Picture::create(['place_id' => $place_id, 'location' => $path, 'width' => $width, 'height' => $height]);

        return redirect()->route('place.show', [$place_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $photo)
    {
        $file = Storage::url($photo->location);
        return response()->download('.'.$file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $photo)
    {
        $place = $photo->place;
        $photo->delete();

        if (!$place->pictures()->count()) {
            $place->ratings()->delete();
        }

        return redirect()->route('place.show', [$place->id]);
    }

    public function likePhoto(Picture $photo, $mark)
    {
        $photo->ratings()->create(['mark' => $mark == 1]);
        $place = $photo->place;

        $_response = [
            'target' => 'photo',
            'id' => $photo->id,
            'likes' => $photo->getLikes(),
            'dislikes' => $photo->getDisLikes(),
            'rating' => $photo->calcRating(),
            'placerating' => $place->calcRating()];

        return response()->json($_response, 200);
    }

}
