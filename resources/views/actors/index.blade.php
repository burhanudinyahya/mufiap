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
        <div class="flex justify-center items-center mt-10">
            @if ($page > 1)
            <a href="?page={{  $page - 1 }}" class="border border-teal-500 text-teal-500 block rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-teal-500 hover:text-white">
                <svg class="h-5 w-5 mr-2 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                    <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0
                        l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0
                        c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                </svg>
                Previous page
            </a>
            @endif
            @if ( $page < 500)
            <a href="?page={{  $page + 1 }}" class="border border-teal-500 bg-teal-500 text-white block rounded-sm font-bold py-4 px-6 ml-2 flex items-center">
                Next page
                <svg class="h-5 w-5 ml-2 fill-current" clasversion="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                    <path id="XMLID_11_" d="M-24,422h401.645l-72.822,72.822c-9.763,9.763-9.763,25.592,0,35.355c9.763,9.764,25.593,9.762,35.355,0
                        l115.5-115.5C460.366,409.989,463,403.63,463,397s-2.634-12.989-7.322-17.678l-115.5-115.5c-9.763-9.762-25.593-9.763-35.355,0
                        c-9.763,9.763-9.763,25.592,0,35.355l72.822,72.822H-24c-13.808,0-25,11.193-25,25S-37.808,422-24,422z"/>
                </svg>
            </a>
            @endif
        </div>
    </div>
@endsection
