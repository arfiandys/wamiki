<?php

namespace App\Livewire\DaftarTamu;

use App\Models\DaftarTamu;
use Livewire\Component;

class CreateDaftarTamu extends Component
{
    public $nama = '';
    public $instansi = '';
    public $layanan = '';
    public $nomor_hp = '';
    public $deskripsi = '';

    public $toastMessage = null;
    public $toastType = 'success'; // atau 'error'

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

            // session()->flash('success','Daftar Tamu added successfully');

            $this->redirect('/daftarTamu');

            $this->toastMessage = 'Data berhasil disimpan.';
            $this->toastType = 'success';
        } catch (\Exception $e) {
            $this->toastMessage = 'Gagal menyimpan data.';
            $this->toastType = 'error';
        }
    }

    public function render()
    {
        return view('livewire.daftar-tamu.create-daftar-tamu');
    }
}
