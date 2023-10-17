@extends('dashboard.layouts.main')

@section('container')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Kode Pemesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pemesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Penumpang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode Kursi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Transportasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tujuan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Berangkat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jam Cek in
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jam Berangkat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Bayar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Petugas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanans as $pemesanan)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $pemesanan->kode_pemesanan }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $pemesanan->tanggal_pemesanan }}
                        </td>
                        @foreach ($pemesanan->penumpang as $penumpang)
                            <td class="px-6 py-4">
                                {{ $penumpang->nama_penumpang }}
                            </td>
                        @endforeach
                        <td class="px-6 py-4">
                            {{ $pemesanan->transportasi->kode }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pemesanan->transportasi->type_transportasi->nama_type }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pemesanan->tujuan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pemesanan->tanggal_berangkat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pemesanan->jam_cekin }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pemesanan->jam_berangkat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pemesanan->total_bayar }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pemesanan->petugas->nama_petugas }}
                        </td>
                        <td
                            class="px-6 py-4 font-semibold capitalize {{ $pemesanan->validate == 'success' ? 'text-green-500' : 'text-gray-400' }}">
                            {{ $pemesanan->validate }}
                        </td>
                        <td class="px-6 py-4 w-[9%]">
                            <form action="/dashboard/validate/{{ $pemesanan->id_pemesanan }}" method="post">
                                @csrf
                                @method('PUT')
                                <select id="validate" name="validate" onchange="this.form.submit()"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="1" {{ $pemesanan->validate == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="2" {{ $pemesanan->validate == 'success' ? 'selected' : '' }}>
                                        Success</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
