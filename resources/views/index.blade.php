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
    <section class="w-full mt-5 relative">
        <h1>Jelajahi Tempat yang menarik di ASEAN</h1>
        <div class="grid grid-cols-3 gap-5">
            <div
                class="w-full bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply py-20 px-10">
                <div class="px-4 mx-auto max-w-screen-xl text-center">
                    <h1 class="mb-4 leading-none text-white">
                        We invest in the world’s potential</h1>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                        <a href="#"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                            Get started
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                            Learn more
                        </a>
                    </div>
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
