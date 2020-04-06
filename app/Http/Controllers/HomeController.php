<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        $popularMovies = MoviesController::list ('popular');

        $nowPlayingMovies = MoviesController::list ('now_playing');

        $upcomingMovies = MoviesController::list ('upcoming');

        $topRatedMovies = MoviesController::list ('top_rated');

        $genres = MoviesController::genres ();

        return view('index', [
            'title' => config ('app.name'),
            'metaDescription' => 'Mufiap adalah aplikasi penyedia list movie terlengkap dan terupdate di dunia.',
            'popularMovies' => $popularMovies,
            'nowPlayingMovies' => $nowPlayingMovies,
            'upcomingMovies' => $upcomingMovies,
            'topRatedMovies' => $topRatedMovies,
            'genres' => $genres
        ]);
    }

}
