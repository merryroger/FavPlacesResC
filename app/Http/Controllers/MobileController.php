<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class MobileController extends Controller
{
    public function index()
    {
        $places = Place::all();
        $places = $places->transform(function ($place) {
            return ['place' => $place, 'rating' => $place->calcRating()];
        });

        return response()->json($places);
    }

    public function show(Place $place)
    {
        $_response = [];
        
        if ($place) {
            $_response = [
                'place_id' => $place->id,
                'pictures' => $place->pictures->transform(function ($picture) {
                    return ['picture' => Config::get('app.url') . Storage::url($picture->location),
                        'width' => $picture->width,
                        'height' => $picture->height];
                }),
            ];
        }

        return response()->json($_response);
    }

}
