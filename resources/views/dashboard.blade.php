<x-app-layout>
<x-slot name="header">
</x-slot>
<section class="bg-gray-50">
    <div class="max-w-screen-xl px-4 pt-32 pb-8 mx-auto lg:items-center lg:flex">
      <div class="text-left">
        <h1 class="text-3xl font-extrabold sm:text-5xl">
          Understand User Flow. <br>
          <strong class="font-extrabold text-red-700 sm:block">
            Increase Conversion.
          </strong>
        </h1>

        <p class="mt-4 sm:leading-relaxed sm:text-xl">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. <br> Nesciunt illo tenetur fuga ducimus numquam ea!
        </p>

        <div class="flex mt-8">
          <a class="block w-full px-12 py-3 text-sm font-medium text-white bg-red-600 rounded shadow sm:w-auto active:bg-red-500 hover:bg-red-700 focus:outline-none focus:ring"
             href="{{ route ('register') }}">
            Join Us
          </a>
        </div>

      </div>
    </div>
    <div class="max-w-screen-xl px-4 py-4 mx-auto">
            <div class="grid gap-4 grid-cols-4 grid-rows-1">
                <div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 bg-white  rounded drop-shadow-lg">
                    <div>
                        <p class="text-3xl font-semibold text-center text-gray-800">82</p>
                        <p class="text-lg text-center text-gray-500">Users</p>
                    </div>
                </div>

                <div id="jh-stats-negative" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white rounded sm:mt-0 drop-shadow-lg">
                    <div>
                        <p class="text-3xl font-semibold text-center text-gray-800">26</p>
                        <p class="text-lg text-center text-gray-500">Genres</p>
                    </div>
                </div>

                <div id="jh-stats-neutral" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white rounded sm:mt-0 drop-shadow-lg">
                    <div>
                        <p class="text-3xl font-semibold text-center text-gray-800">386</p>
                        <p class="text-lg text-center text-gray-500">Books</p>
                    </div>
                </div>

                <div id="jh-stats-neutral" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white rounded sm:mt-0 drop-shadow-lg">
                    <div>
                        <p class="text-3xl font-semibold text-center text-gray-800">192</p>
                        <p class="text-lg text-center text-gray-500">Active Rental Books</p>
                    </div>
                </div>
            </div>
        </div>

</section>


</x-app-layout>
