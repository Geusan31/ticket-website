<!-- start: Sidebar -->
<div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
        <span class="text-lg font-bold text-white ml-3">TravelPedia</span>
    </a>
    <ul class="mt-4">
        @if (Auth::guard('petugas')->user()->id_level == 1)
            <li class="mb-1 group active">
                <a href="/dashboard"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md>
                <i class="ri-home-2-line
                    mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/dashboard/type_transportasi"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-route mr-3 text-lg"></i>
                    <span class="text-sm">Type Transportasi</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/dashboard/rute"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-route mr-3 text-lg"></i>
                    <span class="text-sm">Rute</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/dashboard/transportasi"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-car mr-3 text-lg"></i>
                    <span class="text-sm">Transportasi</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/dashboard/validate"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-check-double mr-3 text-lg"></i>
                    <span class="text-sm">Validasi dan Verifikasi</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/dashboard/laporan"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-regular fa-newspaper mr-3 text-lg"></i>
                    <span class="text-sm">Laporan</span>
                </a>
            </li>
        @elseif(Auth::guard('petugas')->user()->id_level == 2)
            <li class="mb-1 group">
                <a href="/dashboard/validate"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-check-double mr-3 text-lg"></i>
                    <span class="text-sm">Validasi dan Verifikasi</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/dashboard/laporan"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-regular fa-newspaper mr-3 text-lg"></i>
                    <span class="text-sm">Laporan</span>
                </a>
            </li>
        @endif
    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end: Sidebar -->
