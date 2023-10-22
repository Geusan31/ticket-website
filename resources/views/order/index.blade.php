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
                                    <th class="text-left font-semibold">Qty</th>
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
                                                    {{ $order->transportasi->type_transportasi->nama_type }} -
                                                    {{ $order->transportasi->type_transportasi->keterangan }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4">{{ $order->rute->tujuan }}</td>
                                        <td class="py-4">{{ $order->rute->rute_awal }} - {{ $order->rute->rute_awal }}
                                        </td>
                                        <td class="py-4">{{ $order->transportasi->kode }}</td>
                                        <td class="py-4">{{ $order->qty }}</td>
                                        <td class="py-4">Rp.{{ number_format($order->harga, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="md:w-1/4">
                    {{-- <form action="" method="post">
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
                        <button id="pay-button" data-name="{{ session('snapToken') }}"
                            class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Bayar
                            Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
    <div id="snap-container"></div>
@endsection
