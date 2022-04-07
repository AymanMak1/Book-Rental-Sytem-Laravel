@extends('layouts.app')

@section('content')

<div class="max-w-screen-xl px-4 pb-8 mx-auto">

    <div class="mt-10 sm:mt-0 pt-12">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h1 class="font-extrabold text-2xl">Update this Book</h1>
              <p class="mt-1 text-sm text-gray-600">Use the following form to update this book.</p>
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
            <form action="{{route('books.update',$book->slug)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="title" class="block text-sm font-medium text-gray-700">Book Title</label>
                      <input type="text" name="title" id="title" value="{{ $book->title }}"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                      <input type="text" name="author" id="author" value="{{ $book->author }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description"   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" rows="5">
                            {{$book->description}}
                        </textarea>
                    </div>

                    <div class="col-span-6">
                      <label for="released_at" class="block text-sm font-medium text-gray-700">Date of Release</label>
                      <input type="date" name="released_at" id="released_at"  value="{{$book->released_at}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                      <label for="language_code" class="block text-sm font-medium text-gray-700">Language Code</label>
                      <input type="text" name="language_code"  id="language_code"  value="{{$book->language_code}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                        <label for="pages" class="block text-sm font-medium text-gray-700">Pages</label>
                        <input type="number" min="0" name="pages"  id="pages"   value="{{$book->pages}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                      <label for="in_stock" class="block text-sm font-medium text-gray-700">Stock</label>
                      <input type="number" min="0" name="in_stock" id="in_stock" value="{{$book->in_stock}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6">
                        <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                        <input type="text" name="isbn" id="isbn"  value="{{$book->isbn}}"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
