<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/dashboard.css', 'resources/js/dashboard.js', 'resources/js/transportasi.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>{{ $title }}</title>
</head>

<body class="text-gray-800 font-inter">

    @include('dashboard.layouts.partials.sidebar')

    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        {{-- start: Header --}}
        @include('dashboard.layouts.partials.header')
        {{-- end: Header --}}

        <div class="p-6">
            @yield('container')
        </div>
    </main>
    <!-- end: Main -->

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script src="dist/js/script.js"></script> --}}
</body>

</html>
