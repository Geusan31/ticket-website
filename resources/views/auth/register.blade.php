<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite(['resources/css/auth.css'])
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
                    <h1 class="text-white text-4xl font-bold text-center mb-3">Membuat Perjalanan Semakin Mudah</h1>
                    <div>
                        <p class="text-white text-center text-lg">Buat akunmu. Ini gratis dan hanya membutuhkan waktu
                            sebentar</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 py-16 px-12">
                <h2 class="text-3xl mb-4 font-semibold">Buat Akun</h2>
                <form action="/register" method="post" id="myForm">
                    @csrf
                    <div id="penumpangForm" class="block">
                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Anda</label>
                                <input type="text" id="name" name="nama_penumpang"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 penumpangField"
                                    value="{{ old('nama_penumpang') }}" placeholder="Nama anda">
                                @error('nama_penumpang')
                                    <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="username_penumpang"
                                    class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                <input type="text" id="username_penumpang" name="username_penumpang"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 penumpangField"
                                    placeholder="Username" value="{{ old('username_penumpang') }}">
                                @error('username_penumpang')
                                    <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="password_penumpang"
                                    class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" id="password_penumpang" name="password_penumpang"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 penumpangField"
                                    placeholder="•••••••••">
                                @error('password_penumpang')
                                    <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat
                                    anda</label>
                                <input type="text" id="alamat" name="alamat_penumpang"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 penumpangField"
                                    placeholder="Solo" value="{{ old('alamat_penumpang') }}">
                                @error('alamat_penumpang')
                                    <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                    lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 penumpangField"
                                    value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                    <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div>
                                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                    Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-6 penumpangField">
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="laki-laki">Laki Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900">Nomor
                                Telephone</label>
                            <input type="tel" id="telephone" name="telephone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 penumpangField"
                                placeholder="0812-3456-7890" value="{{ old('telephone') }}">
                            @error('telephone')
                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit"
                            class="w-full bg-blue-500 rounded-lg py-3 text-center text-white font-semibold">Buat
                            Akun</button>
                        <p class="text-center mt-5">Sudah punya akun? <a href="/login" class="text-blue-600">Log in
                                aja</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
