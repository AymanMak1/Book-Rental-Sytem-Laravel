@extends('layouts.app')

@section('content')

<div class="max-w-screen-xl px-4 pb-8 mx-auto">
    <div class="flex justify-between">
        <h1 class="font-extrabold pt-12 text-2xl"> Books </h1>
        @if (session()->has('message'))
            <div class="pt-12">
                <p class="mb-4 text-gray-50 bg-green-500 rouded-2xl py-4 px-6">
                    {{session()->get('message')}}
                </p>
            </div>
        @endif
        @if (Auth::check() &&  Auth::user()->is_librarian === 1)
            <div class="pt-12">
                <a href="{{route('books.create')}}"
                class="bg-green-500 uppercase px-5 text-white
                        text-xs font-extrabold py-3 rounded-3xl">
                    Add a Book
                </a>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @if (count($books) > 0)
            @foreach ($books as $book)

            <div class="mt-8">
                <a href="{{route('books.show',$book->slug)}}">
                    @if ($book->cover_image != NULL)
                        <img src={{ asset('/imgs/books/'.$book->cover_image) }} class="hover:brightness-50 ease-in duration-300" alt="{{$book->slug}}">
                    @else
                        <img src={{ asset('/imgs/placeholder.jpg') }} alt="{{$book->slug}}">
                    @endif
                </a>
                <div class="mt-2">
                    <a href="{{route('books.show',$book->slug)}}" class="text-lg mt-2 hover:text-gray:300">{{ $book['title'] }}</a>
                    <div class="flex item-center text-gray-400">
                        <span class="font-extrabold">By {{$book['author']}} <span class="mx-2"> | </span> {{$book['released_at']}}</span>
                    </div>
                    <div class="text-gray-400">
                        {{$book['description']}}
                    </div>
                </div>
                <div class="flex justify-evenly mt-2">
                    @if (Auth::check() &&  Auth::user()->is_librarian === 1)
                        <a href="{{route('books.edit',$book->slug)}}" class="text-cyan-500 italic hover:text-gray-900 pb-2 ">Edit</a>
                        <form action="{{route('books.destroy',$book->slug)}} " method="POST">
                            @csrf
                            @method('delete')
                            <button class="text-red-500 pr-3" type="submit">
                                Delete
                            </button>
                        </form>
                    @endif
                    <a href="{{route('books.show',$book->slug)}}" class="text-gray-700 italic hover:text-gray-900 pb-2">Read More</a>
                </div>
            </div>
            @endforeach
            {{ $books->links('pagination::tailwind') }}
        @else
            No Books Found
        @endif

    </div>
</div>
@endsection
