<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('ticket.png') }}">
    <title>Laporan Pemesanan</title>
    {{-- <link rel="stylesheet" href="./laporan.css"> --}}
    <style>
        .container {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2.5rem 2rem;
            width: 100%
        }

        .header {
            /* display: flex; */
            align-items: center;
            justify-content: space-between;
            margin-bottom: rem;
        }

        .header .logo_container {
            display: flex;
            align-items: center;
        }

        .header .logo_img {
            height: 2rem;
            width: 2rem;
            margin-right: 0.5rem;
        }

        .header .logo_text {
            color: rgb(55 65 81 / 1);
            font-weight: 600;
            font-size: 1.125rem;
            line-height: 1.75rem/
        }

        .header .container_judul {
            color: rgb(55 65 81 / 1);
        }

        .header .container_judul .judul {
            font-weight: 700;
            font-size: 1.25rem;
            line-height: 1.75rem;
            margin-bottom: 0.5rem;
        }

        .header .container_judul .tanggal {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .tabel {
            width: 100%;
            margin-bottom: 2rem;
            text-align: left;
        }

        th {
            color: rgb(55 65 81 / 1);
            font-weight: 700;
            font-size: 16px;
            text-transform: uppercase;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        td {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            font-size: 14px;
            color: rgb(55 65 81 / 1);
        }

        span {
            font-weight: 600
        }

        .container_payment {
            display: flex;
            justify-content: end;
            margin-bottom: 2rem;
        }

        .container_payment .total {
            color: rgb(55 65 81 / 1);
            margin-right: 0.5rem;
        }

        .container_payment .pay {
            color: rgb(55 65 81 / 1);
            font-weight: 700;
            font-size: 1.25rem;
            line-height: 1.75rem;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="header" style="display: flex">
            <div class="logo_container" style="display: flex">
                <img class="logo_img" src="https://tailwindflex.com/public/images/logos/favicon-32x32.png"
                    alt="Logo" />
                <div class="logo_text">TicketPedia</div>
            </div>
            <div class="container_judul">
                <div class="judul">INVOICE</div>
                <div class="tanggal">Date: {{ $tanggal_pemesanan }}</div>
            </div>
        </div>
        <table class="tabel">
            <thead>
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
                            {{ $pemesanan->kode_kursi }}
                        </td>
                        <td>
                            {{ $pemesanan->transportasi->type_transportasi->nama_type }} -
                            {{ $pemesanan->transportasi->type_transportasi->keterangan }}
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
                            {{ $pemesanan->petugas->nama_petugas }}
                        </td>
                        <td class="validate">
                            {{ $pemesanan->validate }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container_payment flex justify-end mb-8">
            <div class="total text-gray-700 mr-2">Total:</div>
            <div class="pay text-gray-700 font-bold text-xl">Rp.{{ number_format($total, 0, ',', '.') }}</div>
        </div>
    </div>
</body>

</html>
