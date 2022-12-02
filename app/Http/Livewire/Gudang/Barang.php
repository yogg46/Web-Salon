<?php

namespace App\Http\Livewire\Gudang;

use App\Models\Barang as ModelsBarang;
use App\Models\detailPembelian;
use App\Models\Pembelian;
use App\Models\Suplier;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Barang extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search = '';
    public $nama_barang, $harga_jual, $harga_beli, $stock;
    public $jumlah, $harga, $total, $subtotal, $tanggal;
    public $barang_id, $pembelian_id, $suplier_id;
    public  $untung;

    public function render()
    {
        return view(
            'livewire.gudang.barang',
            [
                'barang' => ModelsBarang::search('nama_barang', $this->search)->orderBy('updated_at', 'desc')->paginate(10),
                'pilSup' => Suplier::all(),
                'bar' => ModelsBarang::all()->toJson(),

            ]
        )
            ->extends(
                'layouts.main',
                [
                    'tittle' => 'Barang',
                    'slug1' => ''
                ]
            )
            ->section('isi');
    }
    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function resetInput()
    {
        $this->nama_barang = null;
        $this->harga = null;
        $this->untung = null;
        $this->jumlah = null;
        // $this->pembelian_id = null;
    }


    public function store()
    {
        $validatedDate = $this->validate(
            [
                'suplier_id' => 'required',
                'nama_barang.0' => 'required',
                'harga.0' => 'required',
                'jumlah.0' => 'required',
                'untung.0' => 'required',
                'nama_barang.*' => 'required',
                'harga.*' => 'required',
                'jumlah.*' => 'required',
                'untung.*' => 'required',
            ],
            [
                'nama_barang.0.required' => 'nama barang field is required',
                'harga.0.required' => 'harga field is required',
                'jumlah.0.required' => 'jumlah field is required',
                'untung.0.required' => 'untung field is required',
                'nama_barang.*.required' => 'nama barang field is required',
                'harga.*.required' => 'harga field is required',
                'jumlah.*.required' => 'jumlah field is required',
                'untung.*.required' => 'untung field is required',
            ]
        );

        foreach ($this->nama_barang as $key => $value) {

            $cek = ModelsBarang::where('nama_barang', $this->nama_barang[$key])->first();

            if ($cek) {
                $barang = $cek->update([
                    'stock' => ($cek->stock + $this->jumlah[$key]),
                    'harga_beli' => $this->harga[$key],
                    'harga_jual' => ($this->harga[$key] + round($this->harga[$key] * $this->untung[$key] / 100)),
                ]);
                $joko = $cek->id;
                $pembelian = Pembelian::updateOrCreate([
                    'petugas_gudang' => Auth::user()->id,
                    'suplier_id' => $this->suplier_id, 'tanggal' => now()->format('d-m-Y'),
                    'total' => array_sum($this->jumlah)]);
                $detail = $pembelian->pembelianRelasiDetail()->create([
                    'jumlah' => $this->jumlah[$key], 'harga' => $this->harga[$key],
                    'subtotal' => ($this->jumlah[$key] * $this->harga[$key]),
                    'barang_id' => $joko]);
            } else {
                $barang = ModelsBarang::create([
                    'nama_barang' => $this->nama_barang[$key],
                    'harga_beli' => $this->harga[$key],
                    'harga_jual' => ($this->harga[$key] + round($this->harga[$key] * $this->untung[$key] / 100)),
                    'stock' => $this->jumlah[$key]
                ]);
                $pembelian = Pembelian::updateOrCreate([
                    'petugas_gudang' => Auth::user()->id,
                    'suplier_id' => $this->suplier_id, 'tanggal' => now()->format('d-m-Y'),
                    'total' => array_sum($this->jumlah)]);
                $detail = $pembelian->pembelianRelasiDetail()->create([
                    'jumlah' => $this->jumlah[$key],
                    'harga' => $this->harga[$key],
                    'subtotal' => ($this->jumlah[$key] * $this->harga[$key]),
                    'barang_id' => $barang->id]);
            }
        }
        $pembelian->update(['total' => $pembelian->pembelianRelasiDetail()->sum('subtotal')]);
        $this->inputs = [];
        // @dd($pembelian->total);
        $this->resetInput();
        return redirect()->route('barang');
        // $this->emit('save123');
        // $this->dispatchBrowserEvent('closeModal');

        // session()->flash('message', 'Account Added Successfully.');
    }
}