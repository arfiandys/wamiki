<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Daftar Tamu</h2>

    <table class="table-auto w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Instansi</th>
                <th class="border px-4 py-2">Layanan</th>
                <th class="border px-4 py-2">Nomor HP</th>
                <th class="border px-4 py-2">Deskripsi</th>
                <th class="border px-4 py-2">Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftar_tamu as $index => $tamu)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $tamu->nama }}</td>
                    <td class="border px-4 py-2">{{ $tamu->instansi }}</td>
                    <td class="border px-4 py-2">
                        @if ($tamu->layanan == "Rekomendasi")
                            <flux:badge color="green">Rekomendasi</flux:badge>
                        @elseif ($tamu->layanan == "Perpustakaan")
                            <flux:badge color="blue">Perpustakaan</flux:badge>
                        @elseif ($tamu->layanan == "Produk Statistik")
                            <flux:badge color="yellow">Produk Statistik</flux:badge>
                        @elseif ($tamu->layanan == "Konsultasi")
                            <flux:badge color="red">Konsultasi</flux:badge>
                        @else
                            <flux:badge color="zinc">Lainnya</flux:badge>
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $tamu->nomor_hp }}</td>
                    <td class="border px-4 py-2">{{ $tamu->deskripsi }}</td>
                    <td class="border px-4 py-2">{{ $tamu->created_at->format('d M Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$daftar_tamu->links()}}
    </div>
</div>

