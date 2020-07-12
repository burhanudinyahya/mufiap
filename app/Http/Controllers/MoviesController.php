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
        try{
            $movie = Http::withToken(config('services.tmdb.token'))
                ->get("https://api.themoviedb.org/3/movie/${id}?append_to_response=credits,videos,images")
                ->json();

            return view('movies.show', [
                'title' => $movie['title'] . ' — ' . config('app.name'),
                'metaDescription' => $movie['title'] . ' - ' . $movie['overview'],
                'movie' => $movie
            ]);
        }catch (\Exception $e){
            abort(404);
        }
    }

    public function showList($section)
    {
        $ucWord =  ucwords( str_replace ('_', ' ', $section) );
        return view('movies.index', [
            'title' => $ucWord . ' Movies - ' . config ('app.name'),
            'metaDescription' => 'Mufiap adalah aplikasi penyedia list movie terlengkap dan terupdate di dunia.',
            'section' => $ucWord . ' Movies',
            'movies' => self::list ($section),
            'genres' => self::genres ()
        ]);
    }

    public static function list($section)
    {
        try {
            return Http::withToken(config('services.tmdb.token'))
                       ->get('https://api.themoviedb.org/3/movie/' . $section)
                       ->json()['results'];
        }catch (\Exception $e){
            return abort(404);
        }
    }

    public static function genres()
    {
        try {
            $genresArray = Http::withToken(config('services.tmdb.token'))
                               ->get('https://api.themoviedb.org/3/genre/movie/list')
                               ->json()['genres'];

            return collect($genresArray)->mapWithKeys(function ($genre) {
                return [$genre['id'] => $genre['name']];
            });
        }catch (\Exception $e){
            return abort(404);
        }
    }

}
