<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Film;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($id) 
    {
        $film = Film::find($id);
        if (!$film) {
            return response(['message' => 'Film not found'], 404);
        }
        $reviews = Review::where('film_id', $id)->where('is_approved', 1)->get();
       
        return [
            'reviews' => ReviewResource::collection($reviews)
        ];
    }
}
