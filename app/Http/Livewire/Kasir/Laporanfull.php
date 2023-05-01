<?php

namespace App\Http\Livewire\Kasir;

use App\Models\Layanan;
use App\Models\Pembelian;
use Livewire\Component;
use Illuminate\Support\Collection;

class Laporanfull extends Component
{
    public $c=[];
    public $selectedYear;
    public $selectedMonth;
    public $selectedDay;
    public function mount()
    {
        // Set default values for month and year
        $this->selectedMonth = null;
        $this->selectedDay = null;
        $this->selectedYear = date('Y');
    }
    public function render()
    {
        $pembelianItems = Pembelian::query()
            ->whereYear('created_at', $this->selectedYear)
            ->when($this->selectedMonth, function($query) {
                return $query->whereMonth('created_at', $this->selectedMonth);
            })
            ->when($this->selectedDay, function($query) {
                return $query->whereDay('created_at', $this->selectedDay);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $layananItems = Layanan::query()
            ->whereYear('created_at', $this->selectedYear)
            ->when($this->selectedMonth, function($query) {
                return $query->whereMonth('created_at', $this->selectedMonth);
            })
            ->when($this->selectedDay, function($query) {
                return $query->whereDay('created_at', $this->selectedDay);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $mergedItems = collect([]);

        foreach ($pembelianItems as $pembelianItem) {
            $barang =[];
            foreach ($pembelianItem->pembelianRelasiDetail as $key) {
                array_push($barang, $key->detailRelasiBarang->nama_barang.' x '.$key->jumlah);
            }
            $mergedItems->push([
                'TANGGAL' => $pembelianItem->created_at->format('d-m-Y'),
                'KASIR' => null,
                'LAYANAN' => null,
                'JUMLAH_LAYANAN' => null,
                'SUBTOTAL_LAYANAN' => null,
                'PETUGAS GUDANG' => $pembelianItem->pembelianRelasiUser->name,
                'SUPLIER' => $pembelianItem->pembelianRelasiSuplier->nama_suplier,
                'BARANG' => implode(" ",$barang) ,
                'JUMLAH_BARANG' => $pembelianItem->pembelianRelasiDetail->sum('jumlah'),
                'SUBTOTAL_BARANG' => $pembelianItem->subtotal,
            ]);
        }

        foreach ($layananItems as $layananItem) {
            $mergedItems->push([
                'TANGGAL' => $layananItem->created_at->format('d-m-Y'),
                'KASIR' => $layananItem->kasir,
                'LAYANAN' => $layananItem->layanan,
                'JUMLAH_LAYANAN' => $layananItem->jumlah,
                'SUBTOTAL_LAYANAN' => $layananItem->subtotal,
                'PETUGAS GUDANG' => null,
                'SUPLIER' => null,
                'BARANG' => null,
                'JUMLAH_BARANG' => null,
                'SUBTOTAL_BARANG' => null,
            ]);
        }

        $sortedItems = $mergedItems->sortByDesc('TANGGAL');

        return view('livewire.kasir.laporanfull', [
            'items' => $sortedItems,
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
