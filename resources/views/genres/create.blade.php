@extends('layouts.app')

@section('content')

<div class="max-w-screen-xl px-4 pb-8 mx-auto">

    <div class="mt-10 sm:mt-0 pt-12">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Add a Genre</h3>
              <p class="mt-1 text-sm text-gray-600">Use the following form to add a new book genre.</p>
              @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-700">{{$error}}</li>
                    @endforeach
                </ul>
              @endif
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{route('genres.store')}}" method="POST">
                @csrf
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="style" class="block text-sm font-medium text-gray-700">Style</label>
                            <select id="style" name="style" autocomplete="style-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="bg-sky-500">Blue</option>
                                    <option value="bg-neutral-500">Light Neutral</option>
                                    <option value="bg-green-500">Green</option>
                                    <option value="bg-red-600">Red</option>
                                    <option value="bg-amber-400">Amber</option>
                                    <option value="bg-cyan-600">Cyan</option>
                                    <option value="bg-slate-200">Slate</option>
                                    <option value="bg-neutral-900">Dark Neutral</option>
                            </select>
                        </div>

                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>
@endsection
