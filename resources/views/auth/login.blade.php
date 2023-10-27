<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/auth.css'])
    <link rel="icon" type="image/x-icon" href="{{ asset('ticket.png') }}">
</head>

<body>
    <div class="w-full min-h-screen">
        <div class="flex min-h-screen flex-row w-full shadow-lg">
            <div class="w-full lg:w-1/2 flex items-center justify-center bg-no-repeat bg-cover bg-center"
                style="background-image: url('{{ asset('assets/img/aircraft.webp') }}')">
                <div
                    class="w-full h-full flex flex-col p-12 justify-center items-center relative backdrop-brightness-[.4]">
                    <a href="/"
                        class="bg-blue-500 flex justify-center items-center z-20 cursor-pointer rounded-full w-[40px] h-[40px] absolute top-5 left-5">
                        <svg fill="#ffff" height="20px" width="20px" version="1.1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 476.213 476.213" xml:space="preserve">
                            <polygon
                                points="476.213,223.107 57.427,223.107 151.82,128.713 130.607,107.5 0,238.106 130.607,368.714 151.82,347.5 
	57.427,253.107 476.213,253.107 " />
                        </svg>
                    </a>
                    <h1 class="text-white text-4xl font-bold text-center mb-3">Log in untuk nikmati semua keuntungannya
                    </h1>
                    <div>
                        <p class="text-white text-center text-lg">Silahkan Login dahulu</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 py-16 px-12">
                <h2 class="text-3xl mb-4 font-semibold">Masuk</h2>
                @if (session()->has('loginError'))
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Error</span>
                        <div>
                            <span class="font-medium">{{ session('loginError') }}</span>
                        </div>
                    </div>
                @endif
                <form action="/login" method="post" id="myForm">
                    @csrf
                    <div id="petugasForm" class="block">
                        <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                        <div class="mb-3">
                            <input type="text" id="website-admin" name="username"
                                class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 petugasField"
                                placeholder="Username" value="{{ old('username') }}">
                            @error('username')
                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" id="password" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 petugasField"
                                placeholder="•••••••••">
                            @error('password')
                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit"
                            class="w-full bg-blue-500 rounded-lg py-3 text-center text-white font-semibold">Masuk</button>
                        <p class="text-center mt-5">Belum punya akun? <a href="/register" class="text-blue-600">Buat
                                akun dulu!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
