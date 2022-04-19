@extends('layouts.app')

@section('content')

<div class="max-w-screen-xl px-4 pb-8 mx-auto">

    <div class="mt-10 sm:mt-0 pt-12">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Add a Genre</h3>
              <p class="mt-1 text-sm text-gray-600">Use the following form to add a new book genre.</p>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{route('genres.update',$genre->slug)}}" method="POST">
                @csrf
                @method('PUT')
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{$genre->name}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="style" class="block text-sm font-medium text-gray-700">Style</label>
                            <select id="style" name="style" autocomplete="style-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @php
                                        $styles = [
                                            "Blue" => "bg-sky-500",
                                            "Light Neutral" => "bg-neutral-500",
                                            "Green" => "bg-green-500",
                                            "Red" => "bg-red-600",
                                            "Amber" =>"bg-amber-400",
                                            "Cyan" => "bg-cyan-600",
                                            "Slate" => "bg-slate-200",
                                            "Dark Neutral" => "bg-neutral-900"
                                        ];
                                    @endphp
                                    @foreach ($styles as $key => $style )
                                    <option value="{{$style}}"
                                        @if ($style == $genre->style)
                                        selected="selected"
                                        @endif>
                                        {{$key}}
                                    </option>
                                    @endforeach
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
