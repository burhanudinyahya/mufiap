@extends('layouts.main')

@section('content')
    <div class="container mx-auto py-16">
        <div class="section-errors">
            <h1 class="px-4 pb-10 uppercase tracking-wider text-orange-500 text-lg font-semibold text-center ">Page Not Found</h1>
            @foreach ($errors as $err)
                <h2 class="text-center">{{ ucfirst($err) }}</h2>
            @endforeach
        </div> <!-- end section-errors-->
    </div>
@endsection
