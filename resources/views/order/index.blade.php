@extends('layouts.main')

@section('container')
    <div class="bg-gray-100 h-screen py-8">
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
                                                <span class="font-semibold">Ticket {{ $order->transportasi->type_transportasi->nama_type }} - {{ $order->transportasi->type_transportasi->keterangan }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4">{{ $order->rute->tujuan }}</td>
                                        <td class="py-4">{{ $order->rute->rute_awal }} - {{ $order->rute->rute_awal }}</td>
                                        <td class="py-4">{{ $order->transportasi->kode }}</td>
                                        <td class="py-4">Rp.{{ number_format($order->rute->harga, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="md:w-1/4">
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
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
