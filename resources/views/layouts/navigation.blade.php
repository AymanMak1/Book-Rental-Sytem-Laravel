<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{route('home')}}" class="w-20 h-10">
                        <img src="/imgs/brs-logo.png" alt="">
                    </a>

                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex items-center space-x-4">
                    <form class="hidden mb-0 lg:flex">
                        @csrf
                        <div class="relative">
                          <input
                            class="h-10 pr-10 text-sm placeholder-gray-300 border-gray-200 rounded-lg focus:z-1 xl:w-96"
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
            </div>

            <nav
            class="items-center justify-center hidden space-x-8 text-sm font-medium lg:flex lg:flex-1 lg:w-0"
          >
                <a class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300
                focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                href="/books">Books</a>
                <a class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300
                focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                href="/genres">Genres</a>

          </nav>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @guest
                <div class="items-center hidden space-x-4 lg:flex">
                        @if (Route::has('login'))
                                <a
                                class="px-5 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg"
                                href="{{route ('login')}}"
                            >
                                {{__('Login')}}
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a
                            class="px-5 py-2 text-sm font-medium text-white bg-red-600 rounded-lg"
                            href="{{route ('register')}}"
                            >
                                {{__('Register')}}
                            </a>
                        @endif
                </div>
                @else
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('main')" :active="request()->routeIs('main')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        @guest
        @else
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endguest
    </div>
</nav>
