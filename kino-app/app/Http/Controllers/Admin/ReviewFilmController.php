<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Http\Requests\ReviewFilmRequest;

class ReviewFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();

        return view("admin.review.index", compact("reviews"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.review.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewFilmRequest $request)
    {
        $data = $request->validated();

        Review::create($data);

        return redirect(route('reviews.index'));
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
    public function edit(Review $review)
    {
        return view('admin.review.create', compact("review"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewFilmRequest $request, Review $review)
    {
        $review->update($request->validated());

        return redirect(route('reviews.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect(route('reviews.index'));
    }
}
