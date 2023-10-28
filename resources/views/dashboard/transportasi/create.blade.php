@extends('dashboard.layouts.main')

@section('container')
    <form action="/dashboard/transportasi" method="POST">
        @csrf
        <div class="mb-6">
            <label for="kode" class="block mb-2 text-sm font-medium text-gray-900">Kode</label>
            <input type="number" id="kode" name="kode"
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Kode" required value="{{ old('kode') }}">
            @error('kode')
                <div class="mt-2 mb-4 text-sm text-red-600">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="jumlah_kursi" class="block mb-2 text-sm font-medium text-gray-900">Jumlah
                Kursi</label>
            <input type="number" id="jumlah_kursi" name="jumlah_kursi"
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Jumlah Kursi" required value="{{ old('jumlah_kursi') }}">
            @error('jumlah_kursi')
                <div class="mt-2 mb-4 text-sm text-red-600">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="rute" class="block mb-2 text-sm font-medium text-gray-900">Rute</label>
            <select id="rute" name="id_rute"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                required value="{{ old('id_rute') }}">
                <option selected disabled>Pilih Rute</option>
                @foreach ($rutes as $rute)
                    <option value="{{ $rute->id_rute }}">
                        {{ $rute->rute_awal }} - {{ $rute->rute_akhir }}</option>
                @endforeach
            </select>
            @error('id_rute')
                <div class="mt-2 mb-4 text-sm text-red-600">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="transportasi" class="block mb-2 text-sm font-medium text-gray-900">Select
                Transportasi</label>
            <input id="transportasi_display"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                readonly>
            <input id="transportasi" name="id_type_transportasi" readonly value="{{ old('id_type_transportasi') }}"
                type="hidden">
            @error('id_type_transportasi')
                <div class="mt-2 mb-4 text-sm text-red-600">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit"
            class="md:w-max w-full cursor-pointer text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah
            data transportasi</button>
    </form>
@endsection
