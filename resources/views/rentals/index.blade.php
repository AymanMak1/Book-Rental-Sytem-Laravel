@extends('layouts.app')

@section('content')
<div class="max-w-screen-xl px-4 pb-8 mx-auto">
    <div class="flex justify-between">
        <h1 class="font-extrabold pt-12 pb-12 text-2xl"> My Rentals </h1>
        @if (session()->has('message'))
            <div class="pt-12">
                <p class="mb-4 text-gray-50 bg-green-500 rouded-2xl py-4 px-6">
                    {{session()->get('message')}}
                </p>
            </div>
        @endif
    </div>
    <h2 class="font-extrabold pb-8">Rental requests</h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase">
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
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    @if (count($myrentals) > 0)
                        <th scope="col" class="px-6 py-3">
                            <a class="sr-only">Rental Details</a>
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @if (count($myrentals) > 0)
                @foreach ($myrentals as $myrental)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
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
                                <td class="px-6 py-4">
                                    {{$myrental->status}}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{route('rentals.show',$myrental->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                                </td>
                            </tr>
                    @endforeach
                @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 text-center " colspan="5">No Book Rental Requests</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>

@endsection
