<?php

namespace App\Http\Livewire;

use App\Models\pengeluaranlain as ModelsPengeluaranlain;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PengeluaranLain extends Component
{

    public $search = '';
    public $tes = 1;
    public $select = 1;
    public $selectedMonth;
    public $selectedYear;
    public $selectedDay;
    public $keterangan, $total;

    public function mount()
    {
        // Set default values for month and year
        $this->selectedMonth = date('m');
        $this->selectedDay = null;
        $this->selectedYear = date('Y');
    }

    public function render()
    {

        $tgl = DB::table('tb_pengeluaranlain')->pluck(DB::raw('YEAR(created_at)'));
        $itemsa = ModelsPengeluaranlain::query();
        $itemsa->whereYear('created_at', $this->selectedYear)
            ->orderBy('created_at', 'desc');

        if ($this->selectedMonth) {
            $itemsa->whereMonth('created_at', $this->selectedMonth);
        }
        if ($this->selectedDay) {
            $itemsa->whereDay('created_at', $this->selectedDay);
        }

        $items = $itemsa->get();
        return view('livewire.pengeluaran-lain', [
            'tanggal' => $tgl,
            'pembelian' => $items
        ])->extends(
            'layouts.main',
            [
                'tittle' => 'Laporan Pengeluaran Lain',
                'slug1' => ''
            ]
        )
            ->section('isi');
    }


    public function simpan()
    {
        $this->validate(
            [
                'keterangan' => 'required',
                'total' => 'required'
            ],
            [
                'keterangan.required' => 'Kolom Keterangan wajib diisi',
                'total.required' => 'Kolom total wajib diisi'
            ]
        );

        ModelsPengeluaranlain::create([
            'tanggal' => Carbon::now(),
            'user_id' => Auth::user()->id,
            'keterangan' => $this->keterangan,
            'total' => $this->total

        ]);
        // $this->reset(['keterangan', 'total']);

        return redirect()->route('laporan-pengeluaran-lain');
    }
}
