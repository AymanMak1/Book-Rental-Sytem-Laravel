@extends('layouts.app')

@section('content')

<div class="max-w-screen-xl px-4 pb-8 mx-auto">

    <div class="mt-10 sm:mt-0 pt-12">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h1 class="font-extrabold text-2xl">Add a Book</h1>
              <p class="mt-1 text-sm text-gray-600">Use the following form to add a new book.</p>
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
            <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="title" class="block text-sm font-medium text-gray-700">Book Title</label>
                      <input type="text" name="title" id="title" value="{{ old('title') }}"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                      <input type="text" name="author" id="author" value="{{ old('author') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" rows="5">
                            {{ old('description') }}
                        </textarea>
                    </div>
                    @if (count($genres) > 0)
                        <div class="col-span-6">
                            <span class="block text-sm font-medium text-gray-700">Genre : </span>
                            <div class="flex flex-wrap">
                                @foreach($genres as $genre)
                                    <div class="form-check form-check-inline text-sm mt-2 mr-4">
                                        <input type="checkbox" id="{{$genre['name']}}" name="book_genres[]" value="{{$genre['id']}}" />
                                        <label for="{{$genre['name']}}" class="ml-2">{{$genre['name']}}</;> &nbsp;&nbsp;
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif

                    <div class="col-span-6">
                      <label for="released_at" class="block text-sm font-medium text-gray-700">Date of Release</label>
                      <input type="date" name="released_at" id="released_at"  value="{{ old('released_at') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6">
                        <label for="cover_image" class="block text-sm font-medium text-gray-700"> Cover photo </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                          <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                              <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                              <label for="cover_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Upload a file</span>
                                <input id="cover_image" name="cover_image" type="file" class="sr-only">
                              </label>
                              <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEF up to 5MB</p>
                          </div>
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                      <label for="language_code" class="block text-sm font-medium text-gray-700">Language Code</label>
                      <input type="text" name="language_code"  id="language_code"  value="{{ old('language_code') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                        <label for="pages" class="block text-sm font-medium text-gray-700">Pages</label>
                        <input type="number" min="0" name="pages"  id="pages"  value="{{ old('pages') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                      <label for="in_stock" class="block text-sm font-medium text-gray-700">Stock</label>
                      <input type="number" min="0" name="in_stock" id="in_stock" value="{{ old('in_stock') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6">
                        <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                        <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
