@extends('layouts.app')
<!--lg:h-screen-->
@section('content')
<section class="bg-gray-50">
    <div class="max-w-screen-xl px-4 pt-32 pb-8 mx-auto lg:items-center lg:flex">
      <div class="text-left">
        <h1 class="text-3xl font-extrabold sm:text-5xl">
            Borrow Your Favorite Book<br>
          <strong class="font-extrabold text-red-700 sm:block">
            At BRS Library.
          </strong>
        </h1>

        <p class="mt-4 sm:leading-relaxed sm:text-xl">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. <br> Nesciunt illo tenetur fuga ducimus numquam ea!
        </p>
        @guest
            <div class="flex mt-8 mb-3">
                <a class="w-full px-12 py-3 text-sm font-medium text-white bg-red-600 rounded shadow sm:w-auto active:bg-red-500 hover:bg-red-700 focus:outline-none focus:ring"
                    href="{{ route ('register') }}">
                    Join Us
                </a>
            </div>
        @endguest

        @if (count($genres) > 0)
            <div class="">
                    <div class="mt-8 mb-3 xl:w-96">
                      <select class="form-select appearance-none
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" onchange="location = this.value;" aria-label="Default select example">
                            <option selected>List books by genre</option>
                            @foreach($genres as $genre)
                                <option value="{{route('genres.show',$genre->slug)}}">
                                   {{ $genre['name']}}
                                </option>
                            @endforeach
                      </select>
                    </div>
                  </div>
        @endif

      </div>
    </div>
    <div class="max-w-screen-xl px-4 py-4 mx-auto">
            <div class="grid gap-4 grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4">
                <div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 bg-white  rounded drop-shadow-lg">
                    <div>
                        <p class="text-3xl font-semibold text-center text-gray-800">{{ count($users) }}</p>
                        <p class="text-lg text-center text-gray-500">Users</p>
                    </div>
                </div>

                <div id="jh-stats-negative" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white rounded sm:mt-0 drop-shadow-lg">
                    <div>
                        <p class="text-3xl font-semibold text-center text-gray-800">{{count($genres)}}</p>
                        <p class="text-lg text-center text-gray-500">Genres</p>
                    </div>
                </div>

                <div id="jh-stats-neutral" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white rounded sm:mt-0 drop-shadow-lg">
                    <div>
                        <p class="text-3xl font-semibold text-center text-gray-800">{{count($books)}}</p>
                        <p class="text-lg text-center text-gray-500">Books</p>
                    </div>
                </div>

                <div id="jh-stats-neutral" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white rounded sm:mt-0 drop-shadow-lg">
                    <div>
                        <p class="text-3xl font-semibold text-center text-gray-800">{{count($rentals)}}</p>
                        <p class="text-lg text-center text-gray-500">Active Rental Books</p>
                    </div>
                </div>
            </div>
        </div>

</section>

  @endsection
