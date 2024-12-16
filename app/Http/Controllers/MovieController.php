<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = \App\Models\Movie::all();
    return response()->json($movies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'required|date',
        ]);
    
        $movie = \App\Models\Movie::create($validated);
        return response()->json($movie, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $movie = \App\Models\Movie::findOrFail($id);
        return response()->json($movie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'director' => 'sometimes|required|string|max:255',
            'genre' => 'sometimes|required|string|max:255',
            'release_date' => 'sometimes|required|date',
        ]);
    
        $movie = \App\Models\Movie::findOrFail($id);
        $movie->update($validated);
        return response()->json($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie = \App\Models\Movie::findOrFail($id);
    $movie->delete();
    return response()->json(['message' => 'Movie deleted successfully']);
    }
}
