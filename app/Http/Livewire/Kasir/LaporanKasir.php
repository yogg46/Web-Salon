<?php

namespace App\Http\Livewire\Kasir;
use App\Models\Layanan;
use App\Models\Pembelian;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;


use Livewire\Component;

class LaporanKasir extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search='';
    public $tes = 1;
    public $select = 2;
    // public $rinci;


    public function render()
    {

            $tgl =Layanan::pluck('tanggal')->toArray();


        return view('livewire.kasir.laporan-kasir',[
            'layanan'=>Layanan::search('tanggal', $this->search)->orderBy('created_at', 'desc')->paginate(10),
            'pembelian'=>Pembelian::search('tanggal', $this->search)->orderBy('created_at', 'desc')->paginate(10),
            'tgl' => $tgl,
            'rinci' => Pembelian::where('id', $this->tes)->first(),
            'rinci2' => Layanan::where('id', $this->tes)->first(),
        ])->extends(
            'layouts.main',
            [
                'tittle' => 'Laporan Pemasukan',
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
