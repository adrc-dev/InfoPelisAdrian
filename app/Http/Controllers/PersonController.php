<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Movie_crew;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $person = Person::findOrFail($id);
        $moviesFromDirector = Movie_crew::where('person_id', $id)->where('job', 'Director')->get();
        return view("persons.show", compact("person", "moviesFromDirector"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function actors()
    {
        // caso lo quiera todo en una page -.-"
        // $actors = Person::whereHas('movie_cast')->get();

        $actors = Person::whereHas('movie_cast')->paginate(32);
        return view("actors.index", compact('actors'));
    }
}
