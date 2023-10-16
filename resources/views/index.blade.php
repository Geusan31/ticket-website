@extends('layouts.main')

@section('container')
    @if (session()->has('alert'))
        <div class="fixed z-50 shadow-lg right-60 left-60 top-32 flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Authorization</span>
            <div>
                <span class="font-medium">{{ session('alert') }}</span>
            </div>
        </div>
    @endif
    <!-- Jumbotron -->
    <div class="relative overflow-hidden bg-cover bg-no-repeat"
        style="background-position: 50%;background-image: url('{{ asset('/assets/img/beach.webp') }}');height: 550px;">
        <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[#0000008a] bg-fixed">
            <div class="flex h-full items-center justify-center">
                <div class="px-6 text-center text-white md:px-12">
                    <h1 class="mt-2 mb-16 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl">
                        Buat Kenangan Indah di Setiap Perjalanan Anda
                    </h1>
                    <button type="button"
                        class="rounded border-2 border-neutral-50 px-[46px] pt-[14px] pb-[12px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-100 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200"
                        data-te-ripple-init data-te-ripple-color="light">
                        Get started
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex max-w-screen-xl mt-8 relative mx-auto px-7 md:px-16" id="pemesanan">
        <!-- Navigasi Sisi Kiri -->
        <div class="w-1/4 bg-blue-500 text-white py-5 px-3 rounded-md">
            <h1 class="text-xl mb-4">Menu</h1>
            <ul>
                <li id="pesawat" class="mb-2 cursor-pointer hover:bg-blue-600 px-3 py-2 rounded-md">Pesawat</li>
                <li id="keretaApi" class="mb-2 cursor-pointer hover:bg-blue-600 px-3 py-2 rounded-md">Kereta Api</li>
            </ul>
        </div>

        <!-- Formulir Pemesanan Penerbangan -->
        <div id="formPesawat" class="w-3/4 p-5">
            <h1 class="text-xl mb-4">Pemesanan Penerbangan</h1>
            <form action="/pemesanan" method="post">
                @csrf
                <input id="id_transportasi" type="hidden" name="transportasi">
                <div>
                    <label for="rute" class="block mb-2 text-sm font-medium text-gray-900">Rute</label>
                    <select id="rute" name="rute" value="{{ old('rute') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-6 penumpangField">
                        <option selected disabled>Rute</option>
                        @foreach ($rutes as $rute)
                            <option value="{{ $rute->id_rute }}">{{ $rute->rute_awal }} - {{ $rute->rute_akhir }}</option>
                        @endforeach
                    </select>
                    @error('rute')
                        <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label for="tanggal_pergi" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                            pergi</label>
                        <input type="date" id="tanggal_pergi" name="tanggal_pergi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 penumpangField">
                        @error('tanggal_pergi')
                            <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="kode_kursi" class="block mb-2 text-sm font-medium text-gray-900">Kode Kursi</label>
                        <input id="kode_kursi_display"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-6"
                            readonly>
                        <input id="kode_kursi" type="hidden"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            readonly>
                        @error('kode_kursi')
                            <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <!-- Tambahkan elemen form lainnya sesuai kebutuhan -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Pesan ticket Pesawat</button>
            </form>
        </div>

        <!-- Formulir Pemesanan Penerbangan -->
        <div id="formKeretaApi" class="w-3/4 p-5 hidden">
            <h1 class="text-xl mb-4">Pemesanan Kereta Api</h1>
            <form action="/pemesanan" method="post">
                @csrf
                <input type="hidden" name="transportasi" value="keretaApi">
                <div class="mb-4">
                    <label for="from" class="block mb-2">From</label>
                    <input id="from" name="from" class="w-full p-2 border border-gray-300 rounded"
                        value="Jakarta (JKT)">
                </div>
                <!-- Tambahkan elemen form lainnya sesuai kebutuhan -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Pesan ticket Kereta Api</button>
            </form>
        </div>
    </div>

    <!-- Jumbotron -->
    <section class="max-w-screen-xl mt-8 relative mx-auto px-7">
        <h1 class="mb-4 text-xl font-semibold">Temukan kembali diri Anda di Asia dan sekitarnya</h1>
        <div class="grid gird-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
            <div class="w-full bg-cover bg-no-repeat bg-gray-400 bg-blend-multiply pb-32 pt-5 px-2 rounded-lg"
                style="background-position:50%; background-image: url('{{ asset('/assets/img/singapura.jpg') }}')">
                <div class="px-4 mx-auto max-w-screen-xl text-left">
                    <h1 class="mb-2 leading-none text-white text-2xl font-semibold">Singapore</h1>
                    <p class="text-white">644 Wisata</p>
                </div>
            </div>
            <div class="w-full bg-cover bg-no-repeat bg-gray-400 bg-blend-multiply pb-32 pt-5 px-2 rounded-lg"
                style="background-position:50%; background-image: url('{{ asset('/assets/img/malaysia.webp') }}')">
                <div class="px-4 mx-auto max-w-screen-xl text-left">
                    <h1 class="mb-2 leading-none text-white text-2xl font-semibold">Malaysia</h1>
                    <p class="text-white">8.371 Wisata</p>
                </div>
            </div>
            <div class="w-full bg-cover bg-no-repeat bg-gray-400 bg-blend-multiply pb-32 pt-5 px-2 rounded-lg"
                style="background-position:50%; background-image: url('{{ asset('/assets/img/thailand.webp') }}')">
                <div class="px-4 mx-auto max-w-screen-xl text-left">
                    <h1 class="mb-2 leading-none text-white text-2xl font-semibold">Thailand</h1>
                    <p class="text-white">27.449 Wisata</p>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-screen-xl mt-8 mb-5 relative mx-auto px-7">
        <h1 class="mb-4 text-xl font-semibold">Pelarian internasional: dapatkan panduannya</h1>
        <div class="grid gird-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-5">
            <div
                class="relative grid h-[20rem] w-full max-w-[15rem] flex-col items-end overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700">
                <div class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-cover bg-clip-border bg-center text-gray-700 shadow-none"
                    style="background-image: url('{{ asset('assets/img/bali.webp') }}')">
                    <div class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-t from-black/80 via-black/50">
                    </div>
                </div>
                <div class="relative p-6">
                    <h1 class="mb-2 leading-none text-white text-base font-semibold">Bali</h1>
                    <p class="text-base text-white">Indonesia</p>
                </div>
            </div>
            <div
                class="relative grid h-[20rem] w-full max-w-[15rem] flex-col items-end overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700">
                <div class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-cover bg-clip-border bg-center text-gray-700 shadow-none"
                    style="background-image: url('{{ asset('assets/img/bangkok.webp') }}')">
                    <div class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-t from-black/80 via-black/50">
                    </div>
                </div>
                <div class="relative p-6">
                    <h1 class="mb-2 leading-none text-white text-base font-semibold">Bangkok</h1>
                    <p class="text-base text-white">Thailand</p>
                </div>
            </div>
            <div
                class="relative grid h-[20rem] w-full max-w-[15rem] flex-col items-end overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700">
                <div class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-cover bg-clip-border bg-center text-gray-700 shadow-none"
                    style="background-image: url('{{ asset('assets/img/seoul.webp') }}')">
                    <div class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-t from-black/80 via-black/50">
                    </div>
                </div>
                <div class="relative p-6">
                    <h1 class="mb-2 leading-none text-white text-base font-semibold">Seoul</h1>
                    <p class="text-base text-white">South Korea</p>
                </div>
            </div>
            <div
                class="relative grid h-[20rem] w-full max-w-[15rem] flex-col items-end overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700">
                <div class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-cover bg-clip-border bg-center text-gray-700 shadow-none"
                    style="background-image: url('{{ asset('assets/img/istanbul.webp') }}')">
                    <div class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-t from-black/80 via-black/50">
                    </div>
                </div>
                <div class="relative p-6">
                    <h1 class="mb-2 leading-none text-white text-base font-semibold">Istanbul</h1>
                    <p class="text-base text-white">Turkey</p>
                </div>
            </div>
            <div
                class="relative grid h-[20rem] w-full max-w-[15rem] flex-col items-end overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700">
                <div class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-cover bg-clip-border bg-center text-gray-700 shadow-none"
                    style="background-image: url('{{ asset('assets/img/liverpool.webp') }}')">
                    <div class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-t from-black/80 via-black/50">
                    </div>
                </div>
                <div class="relative p-6">
                    <h1 class="mb-2 leading-none text-white text-base font-semibold">Liverpool</h1>
                    <p class="text-base text-white">United Kingdom</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
    @if (Auth::guard('penumpang')->check())
        <h1>Anda berhasil login sebagai penumpang</h1>
    @elseif(Auth::guard('petugas')->check())
        <h1>Anda berhasil login sebagai petugas</h1>
    @else
        <h1>Anda belum login</h1>
    @endif
    @include('partials.footer')
@endsection
