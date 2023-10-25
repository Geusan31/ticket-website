@extends('layouts.main')

@section('container')
    @if (session()->has('alert'))
        <div class="fixed z-50 shadow-lg right-60 left-60 top-52 flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
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

    @if (session()->has('not_found'))
        <div class="fixed z-50 shadow-lg right-60 left-60 top-52 flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Authorization</span>
            <div>
                <span class="font-medium">{{ session('not_found') }}</span>
            </div>
        </div>
    @endif
    <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 w-full hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-[rgba(0, 0, 0, .5)]">
        <div class="relative w-full max-w-2xl max-h-full ">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Detail Pemesanan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="staticModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Detail
                            Pemesanan</h5>
                        <p class="mb-3 font-normal text-gray-700 ">
                            Rute Awal: {{ session('rute_awal') }}<br>
                            Rute Akhir: {{ session('rute_akhir') }}<br>
                            Jumlah Kursi: {{ session('jumlah_kursi') }}<br>
                            Tujuan: {{ session('tujuan') }}<br>
                            Tipe Transportasi: {{ session('nama_type') }}
                        </p>
                        <button data-modal-target="pilihKursiModal" data-modal-toggle="pilihKursiModal" data-modal-hide="staticModal" id="pilihKursi"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="button">
                            Pilih Kursi
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="pilihKursiModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Pilih Kursi
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="pilihKursiModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <!-- Tombol pemilihan kursi dari k1 hingga k10 -->
                    <div class="grid grid-cols-5 gap-4">
                        @for ($i = 1; $i <= session('jumlah_kursi'); $i++)
                            <button data-modal-hide="pilihKursiModal" class="p-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none kursi-button" data-kursi="K{{ $i }}">
                                K{{ $i }}
                            </button>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="flex flex-col md:flex-row max-w-screen-xl mt-8 relative mx-auto px-7 md:px-16" id="pemesanan">
        <!-- Navigasi Sisi Kiri -->
        <div class="md:w-1/4 w-full bg-blue-500 text-white py-5 px-3 rounded-md">
            <h1 class="text-xl mb-4">Menu</h1>
            <ul class="flex flex-col">
                <button id="pesawat" value="Pesawat"
                    class=" text-left mb-2 cursor-pointer hover:bg-blue-600 px-3 py-2 rounded-md">Pesawat</button>
                <button id="keretaApi" value="Kereta Api"
                    class="text-left mb-2 cursor-pointer hover:bg-blue-600 px-3 py-2 rounded-md">Kereta Api</button>
            </ul>
        </div>

        <!-- Formulir Pemesanan Penerbangan -->
        <div id="formPesawat" class="md:w-3/4 w-full p-5">
            <h1 class="text-xl mb-4">Pemesanan Penerbangan</h1>
            <form action="/pemesanan" method="post">
                @csrf
                <input id="id_transportasi" type="text" readonly name="id_transportasi">
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label for="searchAwal" class="block mb-2 text-sm font-medium text-gray-900">Rute
                            Awal</label>
                        <select id="id_rute" name="rute_awal" value="{{ old('rute_awal') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-3 penumpangField">
                            <option selected disabled>-- Rute Awal --</option>
                            @foreach ($rutes as $rute)
                                <option value="{{ $rute->rute_awal }}">{{ $rute->rute_awal }}</option>
                            @endforeach
                        </select>
                        @error('rute_awal')
                            <div class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="searchAwal" class="block mb-2 text-sm font-medium text-gray-900">Rute
                            Akhir</label>
                        <select id="id_rute" name="rute_akhir" value="{{ old('rute_akhir') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-3 penumpangField">
                            <option selected disabled>-- Rute Akhir --</option>
                            @foreach ($rutes as $rute)
                                <option value="{{ $rute->rute_akhir }}">{{ $rute->rute_akhir }}</option>
                            @endforeach
                        </select>
                        @error('rute_akhir')
                            <div class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class=" my-6">
                    <label for="tanggal_berangkat" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                        pergi</label>
                    <input type="date" id="tanggal_berangkat" name="tanggal_berangkat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 penumpangField">
                    @error('tanggal_berangkat')
                        <div class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Tambahkan elemen form lainnya sesuai kebutuhan -->
                <button type="submit"
                    data-session="{{ session('success') }}" data-kode_pemesanan="{{ session('kode_pemesanan') }}" data-id_rute="{{ session('id_rute') }}" data-tanggal_pemesanan="{{ session('tanggal_pemesanan') }}" data-id_penumpang="{{ session('id_penumpang') }}" data-id_transportasi="{{ session('id_transportasi') }}" data-jam_berangkat="{{ session('jam_berangkat') }}" data-jam_cekin="{{ session('jam_cekin') }}" data-id_petugas="{{ session('id_petugas') }}" data-tanggal_berangkat="{{ session('tanggal_berangkat') }}" id="button"
                    class="bg-blue-500 text-white px-4 py-2 rounded">Pesan ticket Pesawat</button>
            </form>
        </div>

        <!-- Formulir Pemesanan Penerbangan -->
        <div id="formKeretaApi" class="md:w-3/4 w-full p-5 hidden">
            <h1 class="text-xl mb-4">Pemesanan Kereta Api</h1>
            <form action="/pemesanan" method="post">
                @csrf
                <input id="id_transportasi_kereta" type="hidden" readonly name="id_transportasi">
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label for="searchAwal_kereta" class="block mb-2 text-sm font-medium text-gray-900">Rute
                            Awal</label>
                        <select id="id_rute" name="rute_awal" value="{{ old('rute_awal') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-3 penumpangField">
                            <option selected disabled>-- Rute Awal --</option>
                            @foreach ($rutes as $rute)
                                <option value="{{ $rute->rute_awal }}">{{ $rute->rute_awal }}</option>
                            @endforeach
                        </select>
                        @error('rute_awal')
                            <div class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="searchAkhir_kereta" class="block mb-2 text-sm font-medium text-gray-900">Rute
                            Akhir</label>
                        <select id="id_rute" name="rute_akhir" value="{{ old('rute_akhir') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-3 penumpangField">
                            <option selected disabled>-- Rute Akhir --</option>
                            @foreach ($rutes as $rute)
                                <option value="{{ $rute->rute_akhir }}">{{ $rute->rute_akhir }}</option>
                            @endforeach
                        </select>
                        @error('rute_akhir')
                            <div class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class=" my-6">
                    <label for="tanggal_berangkat" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                        pergi</label>
                    <input type="date" id="tanggal_berangkat" name="tanggal_berangkat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 penumpangField">
                    @error('tanggal_berangkat')
                        <div class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Tambahkan elemen form lainnya sesuai kebutuhan -->
                <button type="submit" data-modal-target="staticModal" data-modal-toggle="staticModal"
                    class="bg-blue-500 text-white px-4 py-2 rounded">Pesan ticket Kereta Api</button>
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
    @include('partials.footer')
@endsection
