<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
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
                            {{ $pemesanan->rute->tujuan }}
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
