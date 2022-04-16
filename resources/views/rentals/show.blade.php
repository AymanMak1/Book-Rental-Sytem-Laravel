@extends('layouts.app')

@section('content')
<div class="max-w-screen-xl px-4 pb-8 mx-auto">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="md:ml-24">
                <h1 class="text-2xl font-semibold">Book Infos</h1> <br>
                <table class="mt-4">
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Title</td>
                        <td class="pb-2">: {{$rental[0]->title}} </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Author</td>
                        <td class="pb-2">: {{$rental[0]->author}} </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Data of publish</td>
                        <td class="pb-2">: {{$rental[0]->released_at}} </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2"  colspan="2">
                            <br>
                            <a class="bg-green-500 uppercase px-5 text-white
                                    text-xs font-extrabold py-3 rounded-3xl"
                            href="{{route('books.show',$rental[0]->slug)}}">Book Detail</a>
                        </td>
                    </tr>
                </table> <br>
                <div class="border-b border-gray-800">  </div>
                <br>
                <h1 class="text-2xl font-semibold">Rental Infos</h1> <br>
                <table class="mt-4">
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Name of the borrower reader</td>
                        <td class="pb-2">: {{Auth::user()->name}} </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Date of rental request</td>
                        <td class="pb-2">:  {{$rental[0]->created_at}} </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Request Status</td>
                        <td class="pb-2">:  {{$rental[0]->status}} </td>
                    </tr>
                </table>
            </div>
        </div>

</div>

@endsection
