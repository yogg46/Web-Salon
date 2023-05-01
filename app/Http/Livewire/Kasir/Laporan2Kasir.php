<?php

namespace App\Http\Livewire\Kasir;
use App\Models\Layanan;
use App\Models\Pembelian;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;

class Laporan2Kasir extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search='';
    public $tes = 1;
    public $select = 1;
    public $selectedMonth;
    public $selectedYear;
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
        $tgl = DB::table('pembelians')->pluck(DB::raw('YEAR(created_at)'));
        // $tgl =Pembelian::pluck('tanggal')->toArray();
        $itemsa = Pembelian::query();
        $itemsa->whereYear('created_at', $this->selectedYear)
            ->orderBy('created_at', 'desc');

            if ($this->selectedMonth) {
                $itemsa->whereMonth('created_at', $this->selectedMonth);
            }
        if ($this->selectedDay) {
            $itemsa->whereDay('created_at', $this->selectedDay);
        }

        $items = $itemsa->get();
        return view('livewire.kasir.laporan2-kasir',[
            'pembelian'=>$items,
            'tanggal' => $tgl,

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
