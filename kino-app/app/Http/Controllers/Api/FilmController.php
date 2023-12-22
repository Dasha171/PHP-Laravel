<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        $size = $request->query('size', 10);
        $sortBy = $request->query('sortBy', 'name');
        $sortDir = $request->query('sortDir', 'asc');
        $films = Film::query();

        if ($sortBy === 'name') {
            $films->orderBy('name', $sortDir);
        }elseif ($sortBy === 'year') {
            $films->orderBy('year_of_issue', $sortDir);
        }elseif ($sortBy === 'rating') {
            $films->withAvg('ratings', 'ball')->orderBy('ratings_avg_ball', $sortDir);
        }
        if ($request->has('country')) {
            $films->where('country_id', '=', $request->query('country'));
        }
        if ($request->has('categories')) {
            $films->whereHas('categories', function(EloquentBuilder $query) use($request) {
                $query->where('categories_id', '=', $request->query('category'));
            });
        }

        $films = $films->paginate($size);

        return [
            'page' => $films->currentPage(),
            'size' => $films->count(),
            'total' => $films->total(),
            'films' => FilmResource::collection($films),
        ];
    }
    
    public function show($id) {
        $film = Film::find($id);
        if (!$film) {
            return response(['message' => 'Film not found'], 404);
        }

        return new FilmResource($film);
    }
}
