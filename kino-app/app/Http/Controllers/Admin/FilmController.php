<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Http\Requests\FilmRequest;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all() ;

        return view("admin.film.index", compact("films"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.film.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilmRequest $request)
    {
        $data = $request->validated();

        Film::create($data);

        return redirect(route('films.index'));
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
    public function edit(Film $film)
    {
        return view('admin.film.create', compact("film"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FilmRequest $request, Film $film)
    {
        $film->update($request->validated());

        return redirect(route('films.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return redirect(route('films.index'));
    }
}
