<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Models\DaftarTamu;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public $nama = '';
    public $instansi = '';
    public $layanan = '';
    public $nomor_hp = '';
    public $deskripsi = '';

    public $toastMessage = null;
    public $toastType = 'success'; // atau 'error'

    /**
     * Handle an incoming authentication request.
     */
    public function save()
    {
        $this->validate([
            'nama' => 'required|min:3',
            'instansi' => 'required|min:3',
            'layanan' => 'required',
        ]);

        try {
            $daftarTamu = new DaftarTamu();
            $daftarTamu->nama = $this->nama;
            $daftarTamu->instansi = $this->instansi;
            $daftarTamu->layanan = $this->layanan;
            $daftarTamu->nomor_hp = $this->nomor_hp;
            $daftarTamu->deskripsi = $this->deskripsi;
            $daftarTamu->save();

            $this->reset(['nama', 'instansi', 'layanan', 'nomor_hp', 'deskripsi']);
            $this->toastMessage = 'Data berhasil disimpan.';
            $this->toastType = 'success';
        } catch (\Exception $e) {
            $this->toastMessage = 'Gagal menyimpan data.';
            $this->toastType = 'error';
        }
    }
}; ?>

<div class="min-h-screen">
    <h2 class="text-3xl font-extrabold mb-6 text-center text-blue-600">Daftar Tamu / Create</h2>
    <div class="w-full">
        <form wire:submit="save" class="space-y-2">
            <flux:field>
                <flux:label>Nama</flux:label>
                <flux:input wire:model="nama" type="text" placeholder="Nama pengunjung..." />
                <flux:error name="nama" />
            </flux:field>
            <flux:field>
                <flux:label>Instansi</flux:label>
                <flux:input wire:model="instansi" type="text" placeholder="Asal instansi..." />
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
                <flux:input wire:model="nomor_hp" type="text" placeholder="+62..." />
                <flux:error name="nomor_hp" />
            </flux:field>
            <flux:field>
                <flux:label>Deskripsi</flux:label>
                <flux:textarea rows="5" wire:model="deskripsi" type="text"
                    placeholder="Deskripsi keperluan..." />
                <flux:error name="deskripsi" />
            </flux:field>
            <flux:button type="sumbit" variant="primary">Submit</flux:button>
        </form>
    </div>
    @if ($toastMessage)
        <div wire:poll.3s="$set('toastMessage', null)"
            class="fixed bottom-5 right-5 z-50 px-4 py-3 rounded shadow-md text-white
            {{ $toastType === 'success' ? 'bg-green-600' : 'bg-red-600' }}">
            {{ $toastMessage }}
        </div>
    @endif
</div>
