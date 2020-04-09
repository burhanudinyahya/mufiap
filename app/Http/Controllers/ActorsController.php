<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{

    public function index(Request $request)
    {
        $page = $request->input('page');
        try{
            $popularPersons = Http::withToken(config('services.tmdb.token'))
                ->get("https://api.themoviedb.org/3/person/popular?page=${page}")
                ->json();


            if (@$popularPersons['results']) {

    //            $gender = $request->input('gender');
    //            $gender = 0;
    //
    //            $filteredPopularPersons = collect($popularPersons['results'])->filter(function($value, $key) use ($gender) {
    //                return $value['gender'] === $gender;
    //            })->all();

    //            dd($filteredPopularPersons);

                return view('actors.index', [
                    'title' => 'Popular Actor - ' . config ('app.name'),
                    'metaDescription' => 'Mufiap adalah aplikasi penyedia list movie terlengkap dan terupdate di dunia.',
    //                'popularPersons' => $filteredPopularPersons,
                    'popularPersons' => $popularPersons['results'],
                    'page' => (intval($page) > 0) ? intval($page) : 1
                ]);
            } else{
                return view('error', [
                    'title' => 'Page Not Found - ' . config ('app.name'),
                    'metaDescription' => 'Mufiap adalah aplikasi penyedia list movie terlengkap dan terupdate di dunia.',
                    'errors' => $popularPersons['errors']
                ]);
            }
        }catch (\Exception $e){
            return $e;
        }

    }

    public function show($id)
    {
        try{
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
        }catch (\Exception $e){
            return $e;
        }
    }

}
