@extends('dashboard.layouts.main')

@section('container')
    {{-- start: Card --}}
    @include('dashboard.layouts.partials.card')
    {{-- end: Card --}}

    {{-- start: Manage --}}
    @include('dashboard.layouts.partials.manage')
    {{-- end: Manage --}}
@endsection