<nav class="bg-slate-100 border-gray-200 navbar sticky top-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-blue-600">TravelGant</span>
        </a>
        <div class="flex items-center md:order-2">
            @auth
                <div class="flex items-center">
                    <button type="button"
                        class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 bg-cover rounded-full" src="{{ asset('assets/img/user.webp') }}"
                            alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900">
                                @if (Auth::guard('penumpang')->check())
                                    {{ Auth::guard('penumpang')->user()->nama_penumpang }}
                                @elseif(Auth::guard('petugas')->check())
                                    {{ Auth::guard('petugas')->user()->nama_petugas }}
                                @endif
                            </span>
                            <span class="block text-sm  text-gray-500 truncate">
                                @if (Auth::guard('penumpang')->check())
                                    {{ Auth::guard('penumpang')->user()->username }}
                                @elseif(Auth::guard('petugas')->check())
                                    {{ Auth::guard('petugas')->user()->username }}
                                @endif
                            </span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            @if (Auth::guard('petugas')->check())
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                </li>
                            @endif
                            <li>
                                <form action="/logout" method="post" class="block">
                                    @csrf
                                    <button
                                        class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <ul
                    class="font-medium hidden md:flex flex-row p-4 md:p-0 mt-4 items-center border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
                    <li>
                        <a href="/login" class="block py-2 pl-3 pr-4 text-black rounded md:bg-transparent md:p-0"
                            aria-current="page">Login</a>
                    </li>
                    <li>
                        <a href="/register"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">Register</a>
                    </li>
                </ul>
            @endauth
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium gap-1 p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
                <div class="flex flex-col md:flex-row divide-y-2 md:divide-x-2 md:divide-y-0 divide-gray-400">
                    <li class="pb-3 md:px-3 md:pb-0">
                        <a href="/"
                            class="{{ Request::is('/') ? 'bg-blue-700 text-white md:text-blue-700' : 'hover:bg-gray-100 md:hover:text-blue-700 text-gray-900' }} block py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0"
                            aria-current="page">Home</a>
                    </li>
                    <li class="pt-3 md:pl-4 md:pr-3 md:pt-0">
                        <a href="/pesawat"
                            class="{{ Request::is('/pesawat') ? 'bg-blue-700 text-white md:text-blue-700' : 'hover:bg-gray-100 md:hover:text-blue-700 text-gray-900' }} block py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0"
                            aria-current="page">Pesawat</a>
                    </li>
                </div>
                <li class="!ml-0">
                    <a href="/kereta-api"
                        class="{{ Request::is('/kereta-api') ? 'bg-blue-700 text-white md:text-blue-700' : 'hover:bg-gray-100 md:hover:text-blue-700 text-gray-900' }} block py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0"
                        aria-current="page">Kereta api</a>
                </li>
            </ul>
            @guest
                <ul
                    class="font-medium md:hidden flex flex-row p-4 md:p-0 mt-4 items-center border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
                    <li>
                        <a href="/login" class="block py-2 pl-3 pr-4 text-black rounded md:bg-transparent md:p-0"
                            aria-current="page">Login</a>
                    </li>
                    <li>
                        <a href="/register"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">Register</a>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
