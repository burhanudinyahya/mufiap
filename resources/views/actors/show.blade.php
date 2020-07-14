@extends('layouts.main')

@section('content')
    <div class="actors-info border-b border-black-800">
        <div class="container mx-auto px-4 pb-16 flex flex-col md:flex-row">
            <div class="flex-none pt-16">
                <img src="https://image.tmdb.org/t/p/w400/{{ $actor['profile_path'] }}" alt="profile" class="md:w-48 lg:w-96" onerror="this.onerror=null;this.src='https://via.placeholder.com/300x450?text=IMAGE+NOT+AVAILABLE';">
            </div>
            <div class="pt-16 md:ml-12 lg:ml-24">
                <h1 class="text-4xl md:mt-0 font-semibold">{{ $actor['name'] }}</h1>
                @if ($actor['biography'])
                <div class="mt-12">
                    <h2 class="text-black font-semibold">Biography</h2>
                    <div class="flex mt-4">
                        {!! str_replace('.', '.<br>', $actor['biography']) !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="movie-cast border-b border-black-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Movies</h2>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
                @foreach ($actorMovieCreditCast as $cast)
                    @if ($cast['poster_path'])
                    <div class="mt-8">
                        <a href="{{ route('movies.show', $cast['id']) }}">
                            <img src="https://image.tmdb.org/t/p/w300/{{$cast['poster_path']}}" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150"  onerror="this.onerror=null;this.src='https://via.placeholder.com/300x450?text=IMAGE+NOT+AVAILABLE';">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 hover:text-black:300">{{ $cast['title'] }} ({{ \Carbon\Carbon::parse($cast['release_date'])->format('Y') }})</a>
                            <div class="text-sm text-black-400">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div> <!-- end movie-cast -->

    @if (count($actorImagesProfiles) > 0)
    <div class="actor-images">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($actorImagesProfiles as $image)
                <div class="mt-8">
                    <img src="https://image.tmdb.org/t/p/w400/{{ $image['file_path'] }}" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150 cursor-pointer">
                </div>
                @endforeach
            </div>
        </div>
    </div> <!-- end actor-images -->
    @endif
@endsection
