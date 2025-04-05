<div class="min-h-screen">
    <h2 class="text-3xl font-extrabold mb-6 text-center text-blue-600">Daftar Tamu / Create</h2>
    <div class="flex justify-end mb-6">
        <flux:button wire:navigate href="/daftarTamu" variant="primary">Kembali</flux:button>
    </div>
    <div class="w-full">
        <form wire:submit="save" class="space-y-2">
            <flux:field>
                <flux:label>Nama</flux:label>
                <flux:input wire:model="nama" type="text" />
                <flux:error name="nama" />
            </flux:field>
            <flux:field>
                <flux:label>Instansi</flux:label>
                <flux:input wire:model="instansi" type="text" />
                <flux:error name="instansi" />
            </flux:field>
            <flux:select wire:model="layanan" size="sm" placeholder="Pilih Layanan..." label="Layanan">
                <flux:select.option value="Rekomendasi">Rekomendasi</flux:select.option>
                <flux:select.option value="Perpustakaan">Perpustakaan</flux:select.option>
                <flux:select.option value="Produk Statistik">Produk Statistik</flux:select.option>
                <flux:select.option value="Konsultasi">Konsultasi</flux:select.option>
                <flux:select.option value="Lainnya">Lainnya</flux:select.option>
            </flux:select>
            <flux:field>
                <flux:label>Nomor HP</flux:label>
                <flux:input wire:model="nomor_hp" type="text" />
                <flux:error name="nomor_hp" />
            </flux:field>
            <flux:field>
                <flux:label>Deskripsi</flux:label>
                <flux:textarea rows="5" wire:model="deskripsi" type="text" />
                <flux:error name="deskripsi" />
            </flux:field>
            <flux:button type="sumbit" variant="primary">Submit</flux:button>
        </form>
    </div>
</div>
