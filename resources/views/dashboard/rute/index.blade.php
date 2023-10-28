@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium"> {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="flex justify-between items-center w-full mb-3">
        <a href="/dashboard/rute/create"
            class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah
            data rute</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tujuan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rute Awal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rute Akhir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type Transportasi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rutes as $rute)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $rute->id_rute }}
                        </th>
                        <th class="px-6 py-4">
                            {{ $rute->tujuan }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $rute->rute_awal }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $rute->rute_akhir }}
                        </td>
                        <td class="px-6 py-4">
                            Rp.{{ number_format($rute->harga, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $rute->type_transportasi->nama_type }} -
                            {{ $rute->type_transportasi->keterangan }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
