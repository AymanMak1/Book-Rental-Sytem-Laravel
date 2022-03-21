@extends('layouts.base')

@section('content')

<div class="max-w-screen-xl px-4 pb-8 mx-auto">
    <h1 class="font-extrabold pt-12 text-2xl"> Books </h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @if (count($books) > 0)
            @foreach ($books as $book)

            <div class="mt-8">
                <a href="">
                    <img src="{{ $book['cover_image']}}" alt="Free unsplash image">
                </a>
                <div class="mt-2">
                    <a href="" class="text-lg mt-2 hover:text-gray:300">{{ $book['title'] }}</a>
                    <div class="flex item-center text-gray-400">
                        <span class="font-extrabold">By {{$book['author']}} <span class="mx-2"> | </span> {{$book['released_at']}}</span>
                    </div>
                    <div class="text-gray-400">
                        {{$book['description']}}
                    </div>
                </div>
            </div>
            @endforeach
        @else
            No Books Found
        @endif


    </div>
</div>
@endsection
