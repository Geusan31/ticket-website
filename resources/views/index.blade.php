@extends('layouts.main')

@section('container')
    <!-- Jumbotron -->
    <div class="relative overflow-hidden bg-cover bg-no-repeat"
        style="background-position: 50%;background-image: url('{{ asset('/assets/img/beach.webp') }}');height: 550px;">
        <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[#0000008a] bg-fixed">
            <div class="flex h-full items-center justify-center">
                <div class="px-6 text-center text-white md:px-12">
                    <h1 class="mt-2 mb-16 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl">
                        The best offer on the market <br /><span>for your business</span>
                    </h1>
                    <button type="button"
                        class="rounded border-2 border-neutral-50 px-[46px] pt-[14px] pb-[12px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-100 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200"
                        data-te-ripple-init data-te-ripple-color="light">
                        Get started
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
    @if (Auth::guard('penumpang')->check())
        <h1>Anda berhasil login sebagai penumpang</h1>
    @elseif(Auth::guard('petugas')->check())
        <h1>Anda berhasil login sebagai petugas</h1>
    @else
        <h1>Anda belum login</h1>
    @endif
@endsection
