@extends('layouts.app')

@section('content')

<div class="max-w-screen-xl px-4 pb-8 mx-auto">
    <div class="flex justify-between">
        <h1 class="font-extrabold pt-12 text-2xl"> Books Genres </h1>
        @if (Auth::check() &&  Auth::user()->is_librarian === 1)
            <div class="pt-12">
                <a href="genres/create"
                class="bg-green-500 uppercase px-5 text-white
                        text-xs font-extrabold py-3 rounded-3xl">
                    Add a Genre
                </a>
            </div>
        @endif
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @if (count($genres) > 0)
            @foreach($genres as $genre)
             <div>

                    <a href="{{route('genres.show',$genre->slug)}}">
                        <div class="font-extrabold text-lg text-center {{ ($genre['style']=="bg-slate-200") ? "text-neutral-900" : "text-white" }}  {{$genre['style']}}  mt-8 p-4 rounded-lg hover:drop-shadow-lg cursor-pointer">
                            {{ $genre['name']}}
                        </div>
                    </a>


                <div class="mt-2 flex justify-evenly">
                    @if (Auth::check() &&  Auth::user()->is_librarian === 1)
                        <a href="{{route('genres.edit',$genre->slug)}}" class="inline text-cyan-500 italic hover:text-gray-900 pb-2 ">Edit</a>
                        <form action="{{route('genres.destroy',$genre->slug)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="text-red-500 pr-3" type="submit">
                                Delete
                            </button>
                        </form>
                    @endif
                </div>
             </div>


            @endforeach
        @else
            No Genres Found
        @endif


    </div>
</div>
@endsection
