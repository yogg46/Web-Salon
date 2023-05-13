<?php

namespace App\Http\Livewire\Kasir;

use App\Models\Layanan;
use App\Models\Pembelian;
use App\Models\pengeluaranlain;
use Livewire\Component;
use Illuminate\Support\Collection;

class Laporanfull extends Component
{
    public $c = [];
    public $selectedYear;
    public $selectedMonth;
    public $selectedDay;
    public function mount()
    {
        // Set default values for month and year
        $this->selectedMonth = date('m');
        $this->selectedDay = null;
        $this->selectedYear = date('Y');
    }
    public function render()
    {
        // $tgl = DB::table('layanans')->pluck(DB::raw('YEAR(created_at)'));
        // $itemsa = Layanan::query();
        // $itemsa->whereYear('created_at', $this->selectedYear)
        //     ->orderBy('created_at', 'desc');

        // if ($this->selectedMonth) {
        //     $itemsa->whereMonth('created_at', $this->selectedMonth);
        // }
        // if ($this->selectedDay) {
        //     $itemsa->whereDay('created_at', $this->selectedDay);
        // }

        // $items = $itemsa->get();

        $penjualan_jasa = Layanan::with('layananRelasiDetail')
            ->whereYear('created_at', $this->selectedYear);
        if ($this->selectedMonth) {
            $penjualan_jasa->whereMonth('created_at', $this->selectedMonth);
        }
        if ($this->selectedDay) {
            $penjualan_jasa->whereDay('created_at', $this->selectedDay);
        }
        $masuk = $penjualan_jasa->get();

        $pembelian_barang = Pembelian::with('pembelianRelasiDetail')
            ->whereYear('created_at', $this->selectedYear);
        if ($this->selectedMonth) {
            $pembelian_barang->whereMonth('created_at', $this->selectedMonth);
        }
        if ($this->selectedDay) {
            $pembelian_barang->whereDay('created_at', $this->selectedDay);
        }
        $keluar1 = $pembelian_barang->get();


        $lain = pengeluaranlain::whereYear('created_at', $this->selectedYear);
        if ($this->selectedMonth) {
            $lain->whereMonth('created_at', $this->selectedMonth);
        }
        if ($this->selectedDay) {
            $lain->whereDay('created_at', $this->selectedDay);
        }
        $keluar2 = $lain->get();


        $hasil = [];

        foreach ($masuk as $pj) {
            $tgl = $pj->tanggal->format('Y-m-d');

            $keterangan = [];
            foreach ($pj->layananRelasiDetail as $key) {
                $keterangan[] = $key->detailRelasiJasa->jasaRelasiKategori->kategori .' - '.$key->detailRelasiJasa->nama_jasa . ' x ' . $key->jumlah;
            }
            $keterangan_string = implode(", ", $keterangan);
            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pj->layananRelasiUser->name,
                'keterangan' => $keterangan_string,
                'kas_masuk'=> $pj->layananRelasiDetail->sum('subtotal'),
                'kas_keluar'=> null,

            ];
        }

        foreach ($keluar1 as $pb) {
            $tgl = $pb->tanggal->format('Y-m-d');
            $keterangan = [];
            foreach ($pb->pembelianRelasiDetail as $key) {
                $keterangan[] =$key->detailRelasiBarang->nama_barang . ' x ' . $key->jumlah;
            }
            $keterangan_string = implode(", ", $keterangan);
            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pb->pembelianRelasiUser->name,
                'keterangan' => $keterangan_string,
                'kas_masuk'=> null,
                'kas_keluar'=> $pb->pembelianRelasiDetail->sum('subtotal')

            ];
        }

        foreach ($keluar2 as $pl) {
            $tgl = $pl->tanggal->format('Y-m-d');

            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pl->kasir->name,
                'keterangan' => $pl->keterangan,
                'kas_masuk'=> null,
                'kas_keluar'=> $pl->total,
            ];
        }

        $hasil= collect($hasil)->sortBy(function ($item, $key) {
            return $key;
        })->all();
        // $hasil= collect($hasil)->sortByDesc(function ($item, $key) {
        //     return $key;
        // })->all();

        $years = collect($hasil)->keys()->map(function ($date) {
            return substr($date, 0, 4);
        })->unique()->values()->all();


        return view('livewire.kasir.laporanfull', [
            'items' => $hasil,
            'tanggal'=>$years

        ])->extends(
            'layouts.main',
            [
                'tittle' => 'Laporan Pemasukan',
                'slug1' => ''
            ]
        )
            ->section('isi');
    }
}
