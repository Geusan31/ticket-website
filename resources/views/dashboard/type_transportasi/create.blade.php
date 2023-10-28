@extends('dashboard.layouts.main')

@section('container')
    <form action="/dashboard/type_transportasi" method="POST">
        @csrf
        <div class="mb-6">
            <label for="nama_type" class="block mb-2 text-sm font-medium text-gray-900">Nama Type</label>
            <input type="text" id="nama_type" name="nama_type"
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Nama Type" required value="{{ old('nama_type') }}">
            @error('nama_type')
                <div class="mt-2 mb-4 text-sm text-red-600">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan"
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Keterangan" required value="{{ old('keterangan') }}">
            @error('keterangan')
                <div class="mt-2 mb-4 text-sm text-red-600">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit"
            class="md:w-max w-full cursor-pointer text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah
            data type transportasi</button>
    </form>
@endsection
