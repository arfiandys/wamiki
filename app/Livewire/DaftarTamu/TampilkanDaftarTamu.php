<?php

namespace App\Livewire\DaftarTamu;

use App\Models\DaftarTamu;
use Livewire\Component;

use function Pest\Laravel\get;

class TampilkanDaftarTamu extends Component
{
    public function render()
    {
        $daftar_tamu = DaftarTamu::orderBy('id','DESC')->paginate(5);
        return view('livewire.daftar-tamu.tampilkan-daftar-tamu',compact('daftar_tamu'));
    }
}
