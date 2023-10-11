@extends('dashboard.layouts.main')

@section('container')
    <form action="/dashboard/transportasi" method="POST">
        @csrf
        <div class="mb-6">
            <label for="kode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode</label>
            <input type="number" id="kode" name="kode"
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Kode" required value="{{ old('kode') }}">
            @error('kode')
                <div class="mt-2 mb-4 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="jumlah_kursi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                Kursi</label>
            <input type="number" id="jumlah_kursi" name="jumlah_kursi"
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Jumlah Kursi" required value="{{ old('jumlah_kursi') }}">
            @error('jumlah_kursi')
                <div class="mt-2 mb-4 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan"
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Keterangan" required value="{{ old('keterangan') }}">
            @error('keterangan')
                <div class="mt-2 mb-4 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="transportasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                Transportasi</label>
            <select id="transportasi" name="id_type_transportasi"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required value="{{ old('id_type_transportasi') }}">
                <option selected disabled>Choose a transportasi</option>
                @foreach ($transportasis as $transportasi)
                    <option value="{{ $transportasi->type_transportasi->id_type_transportasi }}">
                        {{ $transportasi->type_transportasi->nama_type }}</option>
                @endforeach
            </select>
            @error('id_type_transportasi')
                <div class="mt-2 mb-4 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit"
            class="md:w-max w-full cursor-pointer text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah
            data transportasi</button>
    </form>
@endsection
