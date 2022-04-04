@extends('layouts.app')

@section('content')
<div class="max-w-screen-xl px-4 pb-8 mx-auto">
    <div class="book-details border-b  border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="/imgs/book.jpg" alt="" class="w-96"> <br>
            <div class="md:ml-24">
                <h1 class="text-3xl font-semibold">{{ $book->title }}</h1>
                <table class="mt-4">
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Author</td>
                        <td class="pb-2">: {{ $book->author }}</td>
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
                    <tr  class="font-extrabold">
                        <td colspan="3" class="pb-2 pt-4">
                            {{ $book->description }}
                        </td>
                    </tr>
                </table>

                <div style="width: fit-content; block-size: fit-content;" class="genre bg-amber-400 px-8 py-2 font-extrabold text-center rounded-lg mt-4 text-white">
                    Psychology
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
