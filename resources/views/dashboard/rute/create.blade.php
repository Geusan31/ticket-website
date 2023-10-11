@extends('dashboard.layouts.main')

@section('container')
    <form action="/dashboard/rute" method="POST">
        @csrf
        <div class="mb-6">
            <label for="transportasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                Transportasi</label>
            <select id="transportasi" name="id_transportasi"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required value="{{ old('id_transportasi') }}">
                <option selected disabled>Choose a transportasi</option>
                @foreach ($rutes as $rute)
                    <option value="{{ $rute->transportasi->type_transportasi->id_type_transportasi }}">
                        {{ $rute->transportasi->type_transportasi->nama_type }}</option>
                @endforeach
            </select>
            @error('id_transportasi')
                <div class="mt-2 mb-4 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="tujuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan</label>
            <input type="text" id="tujuan" name="tujuan"
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Tujuan" required value="{{ old('tujuan') }}">
            @error('tujuan')
                <div class="mt-2 mb-4 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="rute_awal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rute Awal</label>
            <input type="rute_awal" id="rute_awal" name="rute_awal"
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Rute Awal" required value="{{ old('rute_awal') }}">
            @error('rute_awal')
                <div class="mt-2 mb-4 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="rute_akhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rute Akhir</label>
            <input type="rute_akhir" id="rute_akhir" name="rute_akhir"
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Rute Akhir" required value="{{ old('rute_akhir') }}">
            @error('rute_akhir')
                <div class="mt-2 mb-4 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
            <input type="harga" id="harga" name="harga"
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Harga" required value="{{ old('harga') }}">
            @error('harga')
                <div class="mt-2 mb-4 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit"
            class="md:w-max w-full cursor-pointer text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah
            data rute</button>
    </form>
@endsection
