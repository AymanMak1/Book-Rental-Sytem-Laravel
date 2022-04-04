@extends('layouts.app')

@section('content')

<div class="max-w-screen-xl px-4 pb-8 mx-auto">
    <h1 class="font-extrabold pt-12 text-2xl"> Books Genres </h1>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @if (count($genres) > 0)
            @foreach($genres as $genre)
                <div class="font-extrabold text-lg text-center text-white {{$genre['style']}} mt-8 p-4 rounded-lg hover:drop-shadow-lg cursor-pointer">
                    <a href="">
                        {{ $genre['name']}}
                    </a>
                </div>
            @endforeach
        @else
            No Genres Found
        @endif
    </div>
</div>
@endsection
