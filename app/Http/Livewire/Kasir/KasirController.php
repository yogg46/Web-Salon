<?php

namespace App\Http\Livewire\Kasir;

use App\Models\Barang;
use App\Models\Jasa;
use App\Models\Kategori;
use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class KasirController extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $s = '';
    public $cek = [];
    public $jumlah = [];

    public $total;
    public $item;

    public function render()
    {
        return view('livewire.kasir.kasir-controller', [
            'kate' => Kategori::all(),
            'jasa' => Jasa::search('kategori_id', $this->s)->get(),
            'bar' => Jasa::pluck('nama_jasa', 'id'),
            'har' => Jasa::pluck('harga', 'id'),
        ])->extends(
            'layouts.main',
            [
                'tittle' => 'Kasir',
                'slug1' => ''
            ]
        )
            ->section('isi');
    }

    public function mount()
    {
        $this->harga = Jasa::pluck('harga', 'id');
        $this->total = 0;
        $this->item = 0;
    }

    public function itemTot()
    {
        $this->item = 0;
        // if (count($this->cek) == count($this->jumlah)) {

        //     $this->item = array_combine($this->cek, $this->jumlah);
        // }
        // foreach ($this->cek as $key => $value) {
        //     if (in_array($this->jumlah[$value], $this->cek, TRUE)) {
        //         $this->item += $this->jumlah[$value];
        //     };
        //     // @dd($this->jumlah[$value]);
        // }
    }

    public function susus($id)
    {
        $this->s = $id;
    }
    public $harga;

    public function TOT($itu)
    {

        $cek1 = Jasa::pluck('harga', 'id');
        $this->harga[$itu] = $this->jumlah[$itu] * $cek1[$itu];
        $this->totalasu();
        $this->itemTot();
    }

    public function rep()
    {
        $this->totalasu();
        // $this->itemTot();
    }
    public function totalasu()
    {
        $this->harga[0] = 0;
        if ($this->total) {
            $this->total = 0;
            foreach ($this->cek as $key => $value) {

                $this->total += $this->harga[$value];
            }
        } else {
            foreach ($this->cek as $key => $value) {

                $this->total += $this->harga[$value];
            }
        }
    }

    public function save()
    {
        foreach ($this->cek as $key => $value) {
            $layanan = Layanan::updateOrCreate([
                'tanggal' => now()->format('d-m-Y'),
                'total' => $this->total,
                'user_id' => Auth::user()->id,
            ]);
            $layanan->layananRelasiDetail()->create([
                'harga' => $this->harga[$value],
                'jumlah' => $this->jumlah[$value],
                'subtotal' => $this->harga[$value] * $this->jumlah[$value],
                'jasa_id' => $value
            ]);
        }

        $this->alert('success', 'Data Berhasil Disimpan');
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->cek = [];
        $this->jumlah = [];
        $this->total = 0;
        $this->harga = Jasa::pluck('harga', 'id');
    }
}
