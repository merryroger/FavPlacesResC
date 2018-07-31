<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Placetype;
use Illuminate\Http\Request;
use App\Http\Requests\PlaceRequest;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listset = Place::all();
        $types = Placetype::all()->pluck('name', 'id');

        return view('placelist', compact('listset', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Placetype::all();

        return view('addplace', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaceRequest $request)
    {
        $newplace = $request->only('name', 'placetype_id');
        Place::create($newplace);

        return redirect()->route('place.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        $listset = $place->pictures->sortByDesc(function ($query) {
            return $query->created_at;
        });

        return view('showplace', compact('place', 'listset'));
    }

    public function addPhoto(Request $request, Place $place)
    {
        $referer = $request->server('HTTP_REFERER');
        $places = Place::all();

        return view('add_linked_photo', compact('places', 'place', 'referer'));
    }

    public function addAnyPhoto()
    {
        $places = Place::all();
        return view('add_wildcard_photo', compact('places'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Place $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //
    }

    public function likePlace(Place $place, $mark)
    {
        $place->ratings()->create(['mark' => $mark == 1]);

        $_response = [
            'target' => 'place',
            'id' => $place->id,
            'likes' => $place->getLikes(),
            'dislikes' => $place->getDisLikes(),
            'placerating' => $place->calcRating()];

        return response()->json($_response, 200);
    }
}
