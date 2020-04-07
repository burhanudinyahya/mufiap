@extends('layouts.main')

@section('content')
    <div class="container mx-auto pt-16">
        <div class="popular-movies">
            <a href="{{ route('movies.popular') }}">
                <h2 class="px-4 uppercase tracking-wider text-orange-500 text-lg font-semibold hover:text-orange-900 inline">Popular</h2>
            </a>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($popularMovies as $movie)
                    @if ($loop->index < 5)
                        <x-movie-card :movie='$movie' :genres='$genres' />
                    @endif
                @endforeach
            </div>
        </div> <!-- end popular-movies -->

        <div class="now-playing-movies pt-24">
            <a href="{{ route('movies.now_playing') }}">
                <h2 class="px-4 uppercase tracking-wider text-orange-500 text-lg font-semibold hover:text-orange-900 inline">Now Playing</h2>
            </a>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($nowPlayingMovies as $movie)
                    @if ($loop->index < 5)
                        <x-movie-card :movie='$movie' :genres='$genres' />
                    @endif
                @endforeach
            </div>
        </div> <!-- end now-playing-movies -->

        <div class="upcoming-movies pt-24">
            <a href="{{ route('movies.upcoming') }}">
                <h2 class="px-4 uppercase tracking-wider text-orange-500 text-lg font-semibold hover:text-orange-900 inline">Upcoming</h2>
            </a>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($upcomingMovies as $movie)
                    @if ($loop->index < 5)
                        <x-movie-card :movie='$movie' :genres='$genres' />
                    @endif
                @endforeach
            </div>
        </div> <!-- end upcoming-movies -->

        <div class="top-rated-movies py-24">
            <a href="{{ route('movies.top_rated') }}">
                <h2 class="px-4 uppercase tracking-wider text-orange-500 text-lg font-semibold hover:text-orange-900 inline">Top Rated</h2>
            </a>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($topRatedMovies as $movie)
                    @if ($loop->index < 5)
                        <x-movie-card :movie='$movie' :genres='$genres' />
                    @endif
                @endforeach
            </div>
        </div> <!-- end top-rated-movies -->
    </div>
@endsection
