<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
        <div class="flex justify-between mb-4 items-start">
            <div class="font-medium">Status Penumpang</div>
            <div class="dropdown">
                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                        class="ri-more-fill"></i></button>
                <ul
                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                    <li>
                        <a href="#"
                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">View
                            Detail</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
                <thead>
                    <tr>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                            Nama Penumpang</th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                            Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penumpangs as $penumpang)
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                        class="w-8 h-8 rounded object-cover block">
                                    <p class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">
                                        {{ $penumpang->nama_penumpang }}</p>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                @if ($penumpang->is_logged_in)
                                    <span
                                        class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">
                                        Active
                                    </span>
                                @else
                                    <span
                                        class="inline-block p-1 rounded bg-slate-200 text-slate-500 font-medium text-[12px] leading-none">
                                        DeActive
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
        <div class="flex justify-between mb-4 items-start">
            <div class="font-medium">Status Petugas</div>
            <div class="dropdown">
                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                        class="ri-more-fill"></i></button>
                <ul
                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                    <li>
                        <a href="#"
                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">View detail</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
            <thead>
                <tr>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                        Nama Petugas</th>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                        Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $tugas)
                    <tr>
                        <td class="py-2 px-4 border-b border-b-gray-50">
                            <div class="flex items-center">
                                <img src="https://placehold.co/32x32" alt=""
                                    class="w-8 h-8 rounded object-cover block">
                                <p class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">
                                    {{ $tugas->nama_petugas }}</p>
                            </div>
                        </td>
                        <td class="py-2 px-4 border-b border-b-gray-50">
                            @if ($tugas->is_logged_in)
                                <span
                                    class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">
                                    Active
                                </span>
                            @else
                                <span
                                    class="inline-block p-1 rounded bg-slate-200 text-slate-500 font-medium text-[12px] leading-none">
                                    DeActive
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
