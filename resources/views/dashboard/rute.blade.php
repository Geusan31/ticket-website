@extends('dashboard.layouts.main')

@section('container')
    <div class="flex justify-between items-center w-full mb-3">
        <a class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah data rute</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
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
                        Transportasi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rutes as $rute)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
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
                            {{ $rute->transportasi->kode }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
