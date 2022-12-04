<?php

namespace App\Http\Livewire\Kasir;
use App\Models\Layanan;
use App\Models\Pembelian;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;

class Laporan2Kasir extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search='';
    public $tes = 1;
    public $select = 1;
    public function render()
    {
        $tgl =Pembelian::pluck('tanggal')->toArray();
        return view('livewire.kasir.laporan2-kasir',[
            'layanan'=>Layanan::search('tanggal', $this->search)->orderBy('created_at', 'desc')->paginate(10),
            'pembelian'=>Pembelian::search('tanggal', $this->search)->orderBy('created_at', 'desc')->paginate(10),
            'tgl' => $tgl,
            'rinci' => Pembelian::where('id', $this->tes)->first(),
            'rinci2' => Layanan::where('id', $this->tes)->first(),
        ])->extends(
            'layouts.main',
            [
                'tittle' => 'Laporan Pengeluaran',
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
