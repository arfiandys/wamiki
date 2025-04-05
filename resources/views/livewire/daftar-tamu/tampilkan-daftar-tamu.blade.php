<div class="min-h-screen">
    <h2 class="text-3xl font-extrabold mb-6 text-center text-blue-600">Daftar Tamu</h2>
    <div class="flex justify-end mb-6">
        <flux:button wire:navigate href="/daftarTamu/create" variant="primary">Tambahkan</flux:button>
    </div>

    <div class="overflow-auto rounded-xl shadow-2xl border border-gray-200">
        <table class="table-auto w-full text-sm text-gray-700">
            <thead class="bg-blue-100 text-blue-800 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3 text-left">Id</th>
                    <th class="px-6 py-3 text-left">Nama</th>
                    <th class="px-6 py-3 text-left">Instansi</th>
                    <th class="px-6 py-3 text-left">Layanan</th>
                    <th class="px-6 py-3 text-left">Nomor HP</th>
                    <th class="px-6 py-3 text-left">Deskripsi</th>
                    <th class="px-6 py-3 text-left">Waktu</th>
                    <th class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($daftar_tamu as $index => $tamu)
                    <tr class="hover:bg-blue-50 transition duration-200 border-b border-gray-200">
                        <td class="px-6 py-4">{{ $tamu->id}}</td>
                        <td class="px-6 py-4">{{ $tamu->nama }}</td>
                        <td class="px-6 py-4">{{ $tamu->instansi }}</td>
                        <td class="px-6 py-4 text-center">
                            @if ($tamu->layanan == "Rekomendasi")
                                <span class="inline-flex items-center justify-center text-center px-3 py-1 rounded-full text-sm font-medium 
                                    max-w-[120px] break-words h-full
                                    bg-green-100 text-green-600">
                                    Rekomendasi
                                </span>
                            @elseif ($tamu->layanan == "Perpustakaan")
                                <span class="inline-flex items-center justify-center text-center px-3 py-1 rounded-full text-sm font-medium 
                                    max-w-[120px] break-words h-full
                                    bg-blue-100 text-blue-600">
                                    Perpustakaan
                                </span>
                            @elseif ($tamu->layanan == "Produk Statistik")
                                <span class="inline-flex items-center justify-center text-center px-3 py-1 rounded-full text-sm font-medium 
                                    max-w-[120px] break-words h-full
                                    bg-yellow-100 text-yellow-600">
                                    Produk Statistik
                                </span>
                            @elseif ($tamu->layanan == "Konsultasi")
                                <span class="inline-flex items-center justify-center text-center px-3 py-1 rounded-full text-sm font-medium 
                                    max-w-[120px] break-words h-full
                                    bg-red-100 text-red-600">
                                    Konsultasi
                                </span>
                            @else
                                <span class="inline-flex items-center justify-center text-center px-3 py-1 rounded-full text-sm font-medium 
                                    max-w-[120px] break-words h-full
                                    bg-gray-200 text-gray-700">
                                    Lainnya
                                </span>
                            @endif
                        </td>                        
                        <td class="px-6 py-4">{{ $tamu->nomor_hp }}</td>
                        <td class="px-6 py-4">{{ $tamu->deskripsi }}</td>
                        <td class="px-6 py-4">{{ $tamu->created_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-1">
                                <flux:button size="sm" variant="primary">Edit</flux:button>
                                <flux:button size="sm" variant="danger">Delete</flux:button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-center">
        <div class="bg-white px-4 py-2 rounded-lg border border-gray-300 shadow-sm hover:shadow-md transition">
            {{ $daftar_tamu->links() }}
        </div>
    </div>
</div>
