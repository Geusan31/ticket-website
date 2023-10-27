@extends('layouts.main')


@section('container')
    @if (session()->has('success'))
        <div class="fixed z-50 shadow-lg right-60 left-60 top-52 flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
            role="alert">
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

    @if (session()->has('pesanan'))
        <div class="fixed z-50 shadow-lg right-60 left-60 top-32 flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium"> {{ session('pesanan') }}
            </div>
        </div>
    @endif
    <div class="bg-gray-100 min-h-screen py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-semibold mb-4">Ticket Cart</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-3/4">
                    <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left font-semibold">Product</th>
                                    <th class="text-left font-semibold">Tujuan</th>
                                    <th class="text-left font-semibold">Rute</th>
                                    <th class="text-left font-semibold">Kode Kursi</th>
                                    <th class="text-left font-semibold">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <img class="h-16 w-16 mr-4" src="https://via.placeholder.com/150"
                                                    alt="Product image">
                                                <span class="font-semibold">Ticket
                                                    {{ $order->rute->type_transportasi->nama_type }} -
                                                    {{ $order->rute->type_transportasi->keterangan }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4">{{ $order->rute->tujuan }}</td>
                                        <td class="py-4">{{ $order->rute->rute_awal }} - {{ $order->rute->rute_awal }}
                                        </td>
                                        <td class="py-4">{{ $order->kode_kursi }}</td>
                                        <td class="py-4">Rp.{{ number_format($order->rute->harga, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="md:w-1/4">
                    {{-- <form action="https://app.sandbox.midtrans.com/snap/v1/transactions" method="post">
                        @csrf
                    </form> --}}
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-lg font-semibold mb-4">Summary</h2>
                        <div class="flex justify-between mb-2">
                            <span>Subtotal</span>
                            <span>Rp.{{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>Pajak</span>
                            <span>Rp.{{ number_format($pajak, 0, ',', '.') }}</span>
                        </div>
                        <hr class="my-2">
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold">Total</span>
                            <span class="font-semibold">Rp.{{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" id="pay-button"
                            data-name="{{ session('snapToken') }}"
                            class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Bayar
                            Sekarang</button>
                        <!-- Modal toggle -->
                        <button id="btnInvoice" data-modal-target="static-modal" data-modal-toggle="static-modal"
                            class="hidden text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg mt-4 w-full text-sm px-5 py-2.5 text-center"
                            type="button">
                            Lihat
                            Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-hidden md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
        <div id="snap-container" class="relative w-full max-w-2xl max-h-full"></div>
    </div>
    <!-- Main modal -->
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Invoice
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="bg-white rounded-lg shadow-lg px-8 py-10 w-full">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center">
                            <img class="h-8 w-8 mr-2" src="https://tailwindflex.com/public/images/logos/favicon-32x32.png"
                                alt="Logo" />
                            <div class="text-gray-700 font-semibold text-lg">TicketPedia</div>
                        </div>
                        <div class="text-gray-700">
                            <div class="font-bold text-xl mb-2">INVOICE</div>
                            <div class="text-sm">Date: {{ $tanggal_pemesanan }}</div>
                        </div>
                    </div>
                    <div class="border-b-2 border-gray-300 pb-8 mb-8">
                        <h2 class="text-2xl font-bold mb-4">Tagih Kepada:</h2>
                        <div class="text-gray-700 mb-2">Nama : {{ $nama_penumpang }}</div>
                        <div class="text-gray-700 mb-2">Alamat : {{ $alamat_penumpang }}</div>
                    </div>
                    <table class="w-full text-left mb-8">
                        <thead>
                            <tr>
                                <th class="text-gray-700 font-bold uppercase py-2">Product</th>
                                <th class="text-gray-700 font-bold uppercase py-2">Tujuan</th>
                                <th class="text-gray-700 font-bold uppercase py-2">Rute</th>
                                <th class="text-gray-700 font-bold uppercase py-2">Kode Kursi</th>
                                <th class="text-gray-700 font-bold uppercase py-2">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="py-4 text-gray-700"><span class="font-semibold">Ticket
                                            {{ $order->rute->type_transportasi->nama_type }} -
                                            {{ $order->rute->type_transportasi->keterangan }}</span></td>
                                    <td class="py-4 text-gray-700">{{ $order->rute->tujuan }}</td>
                                    <td class="py-4 text-gray-700">{{ $order->rute->rute_awal }} - {{ $order->rute->rute_awal }}
                                    </td>
                                    <td class="py-4 text-gray-700">{{ $order->kode_kursi }}</td>
                                    <td class="py-4 text-gray-700">Rp.{{ number_format($order->rute->harga, 0, ',', '.') }}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end mb-8">
                        <div class="text-gray-700 mr-2">Subtotal:</div>
                        <div class="text-gray-700">Rp.{{ number_format($subtotal, 0, ',', '.') }}</div>
                    </div>
                    <div class="flex justify-end mb-8">
                        <div class="text-gray-700 mr-2">Pajak:</div>
                        <div class="text-gray-700">Rp.{{ number_format($pajak, 0, ',', '.') }}</div>

                    </div>
                    <div class="flex justify-end mb-8">
                        <div class="text-gray-700 mr-2">Total:</div>
                        <div class="text-gray-700 font-bold text-xl">Rp.{{ number_format($total, 0, ',', '.') }}</div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="static-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
