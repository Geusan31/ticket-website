@extends('dashboard.layouts.main')

@section('container')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Kode
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah Kursi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type Transportasi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transportasi as $transpor)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $transpor->kode }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $transpor->jumlah_kursi }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transpor->keterangan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transpor->type_transportasi->nama_type }}
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
