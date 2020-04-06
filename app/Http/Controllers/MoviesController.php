<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{

    public function index()
    {
        return self::showList ('popular');
    }

    public function popular()
    {
        return self::showList ('popular');
    }

    public function nowPlaying()
    {
        return self::showList ('now_playing');
    }

    public function upcoming()
    {
        return self::showList ('upcoming');
    }

    public function topRated()
    {
        return self::showList ('top_rated');
    }

    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/${id}?append_to_response=credits,videos,images")
            ->json();

        return view('show', [
            'title' => $movie['title'] . ' — ' . config('app.name'),
            'metaDescription' => $movie['title'] . ' - ' . $movie['overview'],
            'movie' => $movie
        ]);
    }

    public function showList($section)
    {
        $ucWord =  ucwords( str_replace ('_', ' ', $section) );
        return view('movie', [
            'title' => $ucWord . ' Movies - ' . config ('app.name'),
            'metaDescription' => 'Mufiap adalah aplikasi penyedia list movie terlengkap dan terupdate di dunia.',
            'section' => $ucWord . ' Movies',
            'movies' => self::list ($section),
            'genres' => self::genres ()
        ]);
    }

    public static function list($section)
    {
        return Http::withToken(config('services.tmdb.token'))
                   ->get('https://api.themoviedb.org/3/movie/' . $section)
                   ->json()['results'];
    }

    public static function genres()
    {
        $genresArray = Http::withToken(config('services.tmdb.token'))
                           ->get('https://api.themoviedb.org/3/genre/movie/list')
                           ->json()['genres'];

        return collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

    }

}
