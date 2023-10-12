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
    <section class="w-full mt-8 relative px-5 md:px-[10vw]">
        <h1 class="mb-4 text-xl font-semibold">Jelajahi Tempat yang menarik di ASEAN</h1>
        <div class="grid grid-cols-3 gap-5">
            <div
                class="w-full bg-cover bg-no-repeat bg-gray-400 bg-blend-multiply pb-32 pt-10 px-2 rounded-lg" style="background-position:50%; background-image: url('{{asset('/assets/img/singapura.jpg')}}')">
                <div class="px-4 mx-auto max-w-screen-xl text-left">
                    <h1 class="mb-2 leading-none text-white text-2xl font-semibold">Singapore</h1>
                    <p class="text-white">644 Wisata</p>
                </div>
            </div>
            <div
                class="w-full bg-cover bg-no-repeat bg-gray-400 bg-blend-multiply pb-32 pt-10 px-2 rounded-lg" style="background-position:50%; background-image: url('{{asset('/assets/img/malaysia.webp')}}')">
                <div class="px-4 mx-auto max-w-screen-xl text-left">
                    <h1 class="mb-2 leading-none text-white text-2xl font-semibold">Malaysia</h1>
                    <p class="text-white">8.371 Wisata</p>
                </div>
            </div>
            <div
                class="w-full bg-cover bg-no-repeat bg-gray-400 bg-blend-multiply pb-32 pt-10 px-2 rounded-lg" style="background-position:50%; background-image: url('{{asset('/assets/img/thailand.webp')}}')">
                <div class="px-4 mx-auto max-w-screen-xl text-left">
                    <h1 class="mb-2 leading-none text-white text-2xl font-semibold">Thailand</h1>
                    <p class="text-white">27.449 Wisata</p>
                </div>
            </div>
        </div>
        {{-- <div
            class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
            <img class="rounded-lg" src="https://tecdn.b-cdn.net/img/new/slides/017.webp" alt="" />
            <div class="absolute top-0 p-6">
                <h5 class="mb-2 text-xl font-medium leading-tight text-white">
                    Card title
                </h5>
                <p class="mb-4 text-base text-white">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit
                    longer.
                </p>
                <p class="text-base text-white">
                    <small class="text-white">Last updated 3 mins ago</small>
                </p>
            </div>
        </div> --}}
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
