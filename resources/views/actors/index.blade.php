@extends('layouts.main')

@section('content')
    <div class="container mx-auto py-16">
        <div class="section-actors">
            <h2 class="px-4 uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($popularPersons as $actor)
                    <x-actor-card :actor='$actor' />
                @endforeach
            </div>
        </div> <!-- end section-actors-->
    </div>
@endsection
