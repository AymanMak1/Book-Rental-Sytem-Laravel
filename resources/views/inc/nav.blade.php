<header class="shadow-sm">
    <div
      class="flex items-center justify-between h-16 max-w-screen-xl px-4 mx-auto"
    >
      <div class="flex flex-1 w-0 lg:hidden">
        <button class="p-2 text-gray-600 bg-gray-100 rounded-full" type="button">
          <svg
            class="w-5 h-5"
            fill="none"
            stroke="currentColor"
            viewbox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
            ></path>
          </svg>
        </button>
      </div>

      <div class="flex items-center space-x-4">
        <a href="{{route('main')}}" class="w-20 h-10 bg-gray-200 rounded-lg"></a>

        <form class="hidden mb-0 lg:flex">
          <div class="relative">
            <input
              class="h-10 pr-10 text-sm placeholder-gray-300 border-gray-200 rounded-lg focus:z-10"
              placeholder="Search books by Author/Title"
              type="text"
            />

            <button
              class="absolute inset-y-0 right-0 p-2 mr-px text-gray-600 rounded-r-lg"
              type="submit"
            >
              <svg
                class="w-5 h-5"
                fill="currentColor"
                viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  clip-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                  fill-rule="evenodd"
                ></path>
              </svg>
            </button>
          </div>
        </form>
      </div>

      <div class="flex justify-end flex-1 w-0 lg:hidden">
        <button class="p-2 text-gray-500 bg-gray-100 rounded-full" type="button">
          <svg
            class="w-5 h-5"
            fill="currentColor"
            viewbox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              clip-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              fill-rule="evenodd"
            ></path>
          </svg>
        </button>
      </div>

      <nav
        class="items-center justify-center hidden space-x-8 text-sm font-medium lg:flex lg:flex-1 lg:w-0"
      >
            <a class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out" href="">Books</a>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="relative inline-block text-left">
                <div>
                    <button type="button" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out" id="genres-dropdown" aria-expanded="true" aria-haspopup="true">
                        Genres
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </div>

                <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="genres-dropdown" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Drama</a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Romance</a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Actions</a>
                    </div>
                </div>
            </div>

      </nav>

      <div class="items-center hidden space-x-4 lg:flex">
        <a
          class="px-5 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg"
          href="{{route ('login')}}"
        >
          Log in
        </a>
        <a
          class="px-5 py-2 text-sm font-medium text-white bg-red-600 rounded-lg"
          href="{{route ('register')}}"
        >
          Sign up
        </a>
      </div>
    </div>

    <div class="border-t border-gray-100 lg:hidden">
      <nav
        class="flex items-center justify-center p-4 overflow-x-auto text-sm font-medium"
      >
        <a class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out" href="">Books</a>
        <a class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out" href="">
            Genres
        </a>

      </nav>
    </div>
  </header>
