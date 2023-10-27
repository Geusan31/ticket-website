<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('ticket.png') }}">
    <title>{{ $title }}</title>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pemesanan.js', 'resources/js/pembayaran.js'])
</head>

<body>

    @include('partials.navbar')

    <div class="min-h-screen">
        @yield('container')
    </div>

</body>

</html>
