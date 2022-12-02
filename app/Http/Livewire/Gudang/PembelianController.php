<?php

namespace App\Http\Livewire\Gudang;

use App\Models\Pembelian;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class PembelianController extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $search = '';
    // public $rinci;
    public $tes = 1;

    public function render()
    {

        return view('livewire.gudang.pembelian-controller', [
            'pembelian' => Pembelian::search('tanggal', $this->search)->orderBy('created_at', 'desc')->paginate(10),
            'tgl' => Pembelian::pluck('tanggal')->toArray(),
            'rinci' => Pembelian::where('id', $this->tes)->first(),
        ])->extends(
            'layouts.main',
            [
                'tittle' => 'Pembelian',
                'slug1' => ''
            ]
        )
            ->section('isi');
    }


    public function Rincian($id)
    {
        // $rinci = Pembelian::where('id', $id)->get();
        $this->tes = $id;
    }
}