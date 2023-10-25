<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pemesanan</title>
    {{-- <link rel="stylesheet" href="./laporan.css"> --}}
    <style>
        .container {
            position: relative;
            overflow-x: auto;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-radius: 0.5rem;
        }

        .tabel {
            width: 100%;
            font-size: 0.875rem;
            text-align: left;
            color: #6b7280;
        }

        .thead {
            font-size: 0.75rem;
            color: #374151;
            text-transform: uppercase;
            background-color: #f9fafb;
        }

        th {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        tr {
            background-color: #ffffff;
            border-bottom-width: 1px;
        }

        .th_awal {
            font-weight: 500;
            color: #111827;
            white-space: nowrap;
            padding-top: 1rem;
            padding-bottom: 1rem;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        td {
            padding-top: 1rem;
            padding-bottom: 1rem;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .validate {
            padding-top: 1rem;
            padding-bottom: 1rem;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            font-weight: 600;
            text-transform: capitalize;
            color: #10b981;
        }

        h1 {
            margin: 20px 0;
            text-align: center
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Laporan Pemesanan</h1>
        <table class="tabel">
            <thead class="thead text-xs text-gray-700 uppercase bg-gray-50">
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
                    <tr>
                        <th scope="row" class="th_awal">
                            {{ $pemesanan->kode_pemesanan }}
                        </th>
                        <td>
                            {{ $pemesanan->tanggal_pemesanan }}
                        </td>
                        <td>
                            {{ $pemesanan->penumpang->nama_penumpang }}
                        </td>
                        <td>
                            {{ $pemesanan->transportasi->kode }}
                        </td>
                        <td>
                            {{ $pemesanan->transportasi->type_transportasi->nama_type }}
                        </td>
                        <td>
                            {{ $pemesanan->rute->tujuan }}
                        </td>
                        <td>
                            {{ $pemesanan->tanggal_berangkat }}
                        </td>
                        <td>
                            {{ $pemesanan->jam_cekin }}
                        </td>
                        <td>
                            {{ $pemesanan->jam_berangkat }}
                        </td>
                        <td>
                            {{ $pemesanan->total_bayar }}
                        </td>
                        <td>
                            {{ $pemesanan->petugas->nama_petugas }}
                        </td>
                        <td class="validate">
                            {{ $pemesanan->validate }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
