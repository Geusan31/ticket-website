@extends('layouts.main')

@section('container')
    @if (Auth::guard('penumpang')->check())
        <h1 class="text-3xl">Anda telah login sebagai penumpang</h1>
    @elseif(Auth::guard('petugas')->check())
        <h1 class="text-3xl">Anda telah login sebagai petugas</h1>
    @else
        <h1 class="text-3xl">Anda belum login</h1>
    @endif
@endsection
