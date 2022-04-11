@extends('layouts.app')

@section('content')
<div class="max-w-screen-xl px-4 pb-8 mx-auto">
    <div class="book-details border-b  border-gray-800">
        @if (session()->has('message'))
            <div class="pt-12">
                <p class="mb-4 text-gray-50 bg-green-500 rouded-2xl py-4 px-6">
                    {{session()->get('message')}}
                </p>
            </div>
        @endif
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            @if ($book->cover_image != NULL)
                <img src={{ asset('/imgs/books/'.$book->cover_image) }} class="w-96" alt="{{$book->slug}}">
            @else
                <img src={{ asset('/imgs/placeholder.jpg') }} class="w-96" alt="{{$book->slug}}">
            @endif
            <div class="md:ml-24">
                <h1 class="text-3xl font-semibold">{{ $book->title }}</h1>
                <table class="mt-4">
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Author</td>
                        <td class="pb-2">: {{ $book->author }}</td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Genre</td>
                        <td class="pb-2">:
                            @foreach ($book->genres as $genre )
                            <span class="px-2 {{$genre['style']}}">
                                {{$genre['name'] }}
                            </span>&nbsp;
                            @endforeach
                        </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Data of publish</td>
                        <td class="pb-2">: {{ $book->released_at }}</td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Pages</td>
                        <td class="pb-2">: {{ $book->pages }}</td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Language</td>
                        <td class="pb-2">: {{ $book->language_code }}</td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">ISBN Number</td>
                        <td class="pb-2">: {{ $book->isbn }} </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Number of this book in the library</td>
                        <td class="pb-2">: {{$book->in_stock}} </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Number of available books</td>
                        <td class="pb-2">: 56 </td>
                    </tr>

                    <tr  class="font-etrabold">
                        <td colspan="3" class="pb-2 pt-4">
                            {{ $book->description }}
                        </td>
                    </tr>
                    @if (Auth::check() &&  Auth::user()->is_librarian === 0)
                    <tr>
                        <td>
                            <br>
                            <form action="{{ route('rentals.store')}}" method="POST">
                                    @csrf
                                    <input type='hidden' name='reader_id' value='{{Auth::id()}}'>
                                    <input type='hidden' name='book_id' value='{{$book->id}}'>
                                    <input type='hidden' name='book_slug' value='{{$book->slug}}'>
                                    <button type="submit" name="borrow_cta"
                                        class="bg-green-500 uppercase px-5 text-white
                                                text-xs font-extrabold py-3 rounded-3xl">
                                            Borrow this book
                                    </button>
                            </form>
                            </td>
                    </tr>
                    @endif
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
