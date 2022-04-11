@extends('layouts.app')

@section('content')
<div class="max-w-screen-xl px-4 pb-8 mx-auto">
    <div class="flex justify-between">
        <h1 class="font-extrabold pt-12 pb-12 text-2xl"> My Rentals </h1>
    </div>
    <h2 class="font-extrabold pb-8">Rental requests with PENDING status</h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Book Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Author
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date of Rental
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deadline
                    </th>
                    @if (count($myrentals) > 0)
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Check the book</span>
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @if (count($myrentals) > 0)
                    @foreach ($myrentals as $myrental)
                         @if ($myrental->status == "PENDING")
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{$myrental->title}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$myrental->author}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$myrental->created_at}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$myrental->deadline}}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{route('books.show',$myrental->slug)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Check book</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 text-center " colspan="4">No Book Rental Request with Pending Status</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>

@endsection
