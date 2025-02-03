<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Movie;
use App\Models\Movie_crew;
use App\Http\Requests\MovieRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // uso de slug
        $movieSlug = Movie::whereNull('slug')->get();

        foreach ($movieSlug as $movie) {
            $movie->slug = Str::slug($movie->title, '-');
            $movie->save();
        }

        $movies = Movie::paginate(5); // limitamos la paginacion a 5
        return view("movies.index", compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*
        if (Auth::user()->rol !== 'admin') {
            return view('notAllowed');
        }
        */

        $directors = Movie_crew::where('job', 'director')->get();
        return view("movies.create", compact('directors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
    {
        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->budget = $request->input('budget');
        $movie->homepage = $request->input('homepage');
        $movie->overview = $request->input('overview');
        $movie->popularity = $request->input('popularity');
        $movie->release_date = $request->input('release_date');
        $movie->revenue = $request->input('revenue');
        $movie->runtime = $request->input('runtime');
        $movie->movie_status = $request->input('movie_status');
        $movie->tagline = $request->input('tagline');
        $movie->vote_average = $request->input('vote_average');
        $movie->vote_count = $request->input('vote_count');
        $movie->slug = Str::slug($movie->title, '-');

        if ($request->hasFile('img')) {
            $extension = $request->file('img')->getClientOriginalExtension();
            $imgName = $movie->slug . '.' . $extension;
            $request->file('img')
                ->storeAs('movies_img', $imgName, 'public');
            $movie->image = $imgName;
        }

        $movie->save();

        $movieCrew = new Movie_crew();
        $movieCrew->movie_id = $movie->id; // asociar con la movie creada
        $movieCrew->person_id = $request->input('director'); // el id de la persona seleccionada
        $movieCrew->job = 'director';
        $movieCrew->save();

        return redirect()->route('movies.show', $movie->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $movie = Movie::where('slug', $slug)->firstOrFail();
        $director = Movie_crew::where('movie_id', $movie->id)->where('job', 'director')->first();
        return view("movies.show", compact("movie", "director"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        /*
        if (Auth::user()->rol !== 'admin') {
            return view('notAllowed');
        }
        */

        $movie = Movie::where('slug', $slug)->firstOrFail();
        $directors = Movie_crew::where('job', 'director')->get();
        return view("movies.edit", compact("movie", "directors"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, string $slug)
    {
        $movie = Movie::where('slug', $slug)->firstOrFail();

        $movie->title = $request->input('title');
        $movie->budget = $request->input('budget');
        $movie->homepage = $request->input('homepage');
        $movie->homepage = $request->input('homepage');
        $movie->overview = $request->input('overview');
        $movie->popularity = $request->input('popularity');
        $movie->release_date = $request->input('release_date');
        $movie->revenue = $request->input('revenue');
        $movie->runtime = $request->input('runtime');
        $movie->movie_status = $request->input('movie_status');
        $movie->tagline = $request->input('tagline');
        $movie->vote_average = $request->input('vote_average');
        $movie->vote_count = $request->input('vote_count');
        $movie->slug = Str::slug($movie->title, '-');

        if ($request->hasFile('img')) {
            $extension = $request->file('img')->getClientOriginalExtension();
            $imgName = $movie->slug . '.' . $extension;
            $request->file('img')
                ->storeAs('movies_img', $imgName, 'public');
            $movie->image = $imgName;
        }

        $movieCrew = new Movie_crew();
        $movieCrew->movie_id = $movie->id; // asociar con la movie creada
        $movieCrew->person_id = $request->input('director'); // el id de la persona seleccionada
        $movieCrew->job = 'director';
        $movieCrew->save();

        $movie->save();

        return redirect()->route('movies.show', $movie->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $movie = Movie::where('slug', $slug)->firstOrFail();
        $movie->delete();
        return redirect()->route('movies.index');
    }

    public function characters($slug)
    {
        $movie = Movie::where('slug', $slug)->firstOrFail();
        return view('movies.characters', compact('movie'));
    }
}
