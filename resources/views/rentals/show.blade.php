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
                        <td class="pb-2">: {{$rental[0]->name}} </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Date of rental request</td>
                        <td class="pb-2">:  {{$rental[0]->created_at}} </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Request Status</td>
                        <td class="pb-2">:  {{$rental[0]->status}} </td>
                    </tr>
                    @if($rental[0]->status != 'PENDING')
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Rental Request Managed By</td>
                        <td class="pb-2">: {{ $rental[0]->request_managed_by_name[0]->name}} </td>
                    </tr>
                    <tr class="font-extrabold">
                        <td class="text-gray-400 pb-2">Date of processing</td>
                        <td class="pb-2">: {{ $rental[0]->request_processed_at}} </td>
                    </tr>
                    @if($rental[0]->returned_at != null)
                        <tr class="font-extrabold">
                            <td class="text-gray-400 pb-2">Date of Return</td>
                            <td class="pb-2">: {{$rental[0]->returned_at}} </td>
                        </tr>
                        @if($rental[0]->return_managed_by != null)
                        <tr class="font-extrabold">
                            <td class="text-gray-400 pb-2">Return Managed by</td>
                            <td class="pb-2">: {{ $rental[0]->request_managed_by_name[0]->name}} </td>
                        </tr>
                        @endif
                    @endif
                    @endif
                </table> <br>
                @if ( Auth::user()->is_librarian === 1)
                <div class="border-b border-gray-800">  </div>
                <br>
                <h1 class="text-2xl font-semibold">Rental Management</h1> <br>
                    <form action="{{route('rentals.update',$rental[0]->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-span-6 sm:col-span-3">
                            <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                            <input type="date" min="{{date('Y-m-d'), strtotime($rental[0]->created_at)}}" value="{{$rental[0]->deadline}}" name="deadline" id="deadline"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status" autocomplete="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @php
                                $status = [
                                        "ACCEPTED",
                                        "REJECTED",
                                        "RETURNED"
                                    ];
                                @endphp
                                @foreach ($status as $status)
                                    @if ($rental[0]->status !== 'RETURNED')
                                        <option value="{{$status}}"
                                        @if ($rental[0]->status == '{{$status}}')
                                            {{'selected="selected"'}}
                                        @endif>{{$status}}</option>
                                    @endif
                                    @if($rental[0]->status === 'RETURNED' && $rental[0]->returned_at !== null)
                                        <option value="{{$status}}"
                                        @if ($rental[0]->status == '{{$status}}')
                                            {{'selected="selected"'}}
                                        @endif>{{$status}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="py-3 text-right">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </form>
                @endif

                @if ( Auth::user()->is_librarian === 0 && $rental[0]->status === "ACCEPTED")
                <form action="{{route('rentals.update',$rental[0]->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="date-local" style="display:none;" name="returned_at" value="{{date('Y-m-d H:i:s')}}">
                    <button type="submit" class="bg-green-500 uppercase px-5 text-white
                    text-xs font-extrabold py-3 rounded-3xl">Return This Book</button>
                </form>
                @endif

                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                      <li class="text-red-700">{{$error}}</li>
                    @endforeach
                </ul>
                @endif

            </div>
        </div>
</div>

@endsection
