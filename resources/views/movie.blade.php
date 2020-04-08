@extends('layouts.main')

@section('content')
    <div class="container mx-auto py-16">
        <div class="section-movies">
            <h2 class="px-4 uppercase tracking-wider text-orange-500 text-lg font-semibold">{{ $section }}</h2>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6">
                @foreach ($movies as $movie)
                    <x-movie-card :movie='$movie' :genres='$genres' />
                @endforeach
            </div>
        </div> <!-- end section-movies -->
    </div>
@endsection
