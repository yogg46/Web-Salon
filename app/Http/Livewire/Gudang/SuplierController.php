<?php

namespace App\Http\Livewire\Gudang;

use App\Models\Suplier;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class SuplierController extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search = '';
    public $nama_suplier, $alamat;


    public function render()
    {
        return view('livewire.gudang.suplier-controller', [
            'suplier' => Suplier::search('nama_suplier', $this->search)->orderBy('created_at', 'desc')->paginate(10),
        ])->extends(
            'layouts.main',
            [
                'tittle' => 'Suplier',
                'slug1' => ''
            ]
        )
            ->section('isi');
    }
    public function resetInput()
    {
        $this->nama_suplier = null;
        $this->alamat = null;
    }
    public function save()
    {
        $this->validate([
            'nama_suplier' => 'required',
            'alamat' => 'required',

        ]);

        $simpan = new Suplier;

        $simpan->nama_suplier = $this->nama_suplier;
        $simpan->alamat = $this->alamat;

        $simpan->save();
        $this->alert('success', 'Data Berhasil Disimpan');
        $this->resetInput();

        return redirect()->route('suplier');
    }
}