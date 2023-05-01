<?php

namespace App\Http\Livewire\Kasir;

use App\Models\Layanan;
use App\Models\Pembelian;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


use Livewire\Component;

class LaporanKasir extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search = '';
    public $tes = 1;
    public $select = 2;
    public $startDate;
    public $endDate;
    public $selectedMonth;
    public $selectedYear;
    public $selectedDay;
    // public $rinci;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function mount()
    {
        // Set default values for month and year
        $this->selectedMonth = date('m');
        $this->selectedDay = null;
        $this->selectedYear = date('Y');
    }

    public function render()
    {

        $tgl = DB::table('layanans')->pluck(DB::raw('YEAR(created_at)'));
        $itemsa = Layanan::query();
        $itemsa->whereYear('created_at', $this->selectedYear)
            ->orderBy('created_at', 'desc');
            
            if ($this->selectedMonth) {
                $itemsa->whereMonth('created_at', $this->selectedMonth);
            }
        if ($this->selectedDay) {
            $itemsa->whereDay('created_at', $this->selectedDay);
        }

        $items = $itemsa->get();

        return view('livewire.kasir.laporan-kasir', [
            'item' => $items,
            'tanggal' => $tgl,
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

    public function export()
{
    $data = Layanan::all();

    // dd($data);

    return Excel::download(function($excel) use ($data) {
        $excel->sheet('Sheet 1', function($sheet) use ($data) {
            // dd($data);
            $sheet->fromArray($data);
        });
    }, 'data.xlsx');
}
}
