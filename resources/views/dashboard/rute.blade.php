@extends('dashboard.layouts.main')

@section('container')
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
                            {{ $rute->harga }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $rute->id_transportasi }}
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
