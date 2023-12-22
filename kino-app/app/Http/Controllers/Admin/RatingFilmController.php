<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RatingFilmRequest;
use App\Models\Rating;

class RatingFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratings = Rating::all();

        return view("admin.rating.index", compact("ratings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.rating.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RatingFilmRequest $request)
    {
        $data = $request->validated();

        Rating::create($data);

        return redirect(route('ratings.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        return view('admin.rating.create', compact("rating"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RatingFilmRequest $request, Rating $rating)
    {
        $rating->update($request->validated());

        return redirect(route('ratings.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        $rating->delete();

        return redirect(route('ratings.index'));
    }
}
