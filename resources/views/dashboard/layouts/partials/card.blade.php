<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
                <div class="text-2xl font-semibold mb-1">{{ $penumpang_count }}</div>
                <div class="text-sm font-medium text-gray-400">Penumpang</div>
            </div>
        </div>
        <div class="flex items-center">
            <div class="w-full bg-gray-100 rounded-full h-4">
                <div class="h-full bg-blue-500 rounded-full p-1" style="width: {{ $persentase_penumpang }}%;">
                    <div class="w-2 h-2 rounded-full bg-white ml-auto"></div>
                </div>
            </div>
            <span class="text-sm font-medium text-gray-600 ml-4">{{ $persentase_penumpang }}%</span>
        </div>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
                <div class="text-2xl font-semibold mb-1">{{ $petugas_count }}</div>
                <div class="text-sm font-medium text-gray-400">Petugas</div>
            </div>
        </div>
        <div class="flex items-center">
            <div class="w-full bg-gray-100 rounded-full h-4">
                <div class="h-full bg-blue-500 rounded-full p-1" style="width: {{ $persentase_petugas }}%;">
                    <div class="w-2 h-2 rounded-full bg-white ml-auto"></div>
                </div>
            </div>
            <span class="text-sm font-medium text-gray-600 ml-4">{{ $persentase_petugas }}%</span>
        </div>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
                <div class="text-2xl font-semibold mb-1">{{ $pemesanan_count }}</div>
                <div class="text-sm font-medium text-gray-400">Orders</div>
            </div>
        </div>
        <a href="/dashboard/validate" class="text-blue-500 font-medium text-sm hover:text-blue-600">View details</a>
    </div>
</div>
