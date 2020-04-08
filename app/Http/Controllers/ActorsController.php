<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{

    public function index()
    {
        $popularPersons = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/person/popular")
            ->json()['results'];

        return view('actors.index', [
            'title' => 'Popular Actor - ' . config ('app.name'),
            'metaDescription' => 'Mufiap adalah aplikasi penyedia list movie terlengkap dan terupdate di dunia.',
            'popularPersons' => $popularPersons
        ]);
    }

    public function show($id)
    {
        $actor = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/person/${id}")
            ->json();

        $actorMovieCreditCast = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/person/${id}/movie_credits")
            ->json()['cast'];

        $actorMovieCreditCast = collect($actorMovieCreditCast)->mapWithKeys(function ($movie) {
            return [
                $movie['id'] => [
                    'id'=>$movie['id'],
                    'title'=>$movie['title'],
                    'poster_path'=>$movie['poster_path'],
                    'release_date'=>@$movie['release_date'],
                    'character'=>$movie['character']
                ]
            ];
        })->sortByDesc('release_date')->all();

        $actorImagesProfiles = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/person/${id}/images")
            ->json()['profiles'];

        return view('actors.show', [
            'title' => $actor['name'] . ' — ' . config('app.name'),
            'metaDescription' => $actor['name'] . ' - ' . $actor['biography'],
            'actor' => $actor,
            'actorMovieCreditCast' => $actorMovieCreditCast,
            'actorImagesProfiles' => $actorImagesProfiles
        ]);
    }

}
