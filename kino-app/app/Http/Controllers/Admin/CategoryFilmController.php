<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryFilm;
use App\Http\Requests\CategoryFilmRequest;

class CategoryFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryFilms = CategoryFilm::all() ;

        return view("admin.categoryfilm.index", compact("categoryFilms"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categoryfilm.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFilmRequest $request)
    {
        $data = $request->validated();

        CategoryFilm::create($data);

        return redirect(route('categoryfilms.index'));
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
    public function edit(CategoryFilm $categoryFilm)
    {
        return view('admin.categoryfilm.create', compact("categoryFilm"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFilmRequest $request, CategoryFilm $categoryFilm)
    {
        $categoryFilm->update($request->validated());

        return redirect(route('categoryfilms.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryFilm $categoryFilm)
    {
        $categoryFilm->delete();

        return redirect(route('categoryfilms.index'));
    }
}
