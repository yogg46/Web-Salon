<?php

namespace App\Http\Livewire\Gudang;

use App\Models\Barang;
use App\Models\Pengambilan;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class PengambilanController extends Component
{

    use WithPagination;
    use LivewireAlert;
    public $sisa = 0;


    public function render()
    {
        return view('livewire.gudang.pengambilan-controller', [
            'pengambilan' => Pengambilan::orderBy('created_at', 'desc')->paginate(10),
            'pilSup' => User::where('role', 'gudang')->get(),
            'pilBarang' => Barang::where('stock', '>', 0)->get(),
            'sisaBar' => Barang::where('id', $this->barang_id)->first()
        ])->extends(
            'layouts.main',
            [
                'tittle' => 'Pengambilan',
                'slug1' => ''
            ]
        )
            ->section('isi');
    }


    public $inputs = [];
    public $i = 1;
    public $jumlah = [];
    public $user_id;
    public $barang_id = [];
    public function mount()
    {
        $this->barang_id[0] = null;
        $this->jumlah[0] = null;
        # code...
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
        // array_push($this->barang_id, null);
        // array_push($this->jumlah, null);
        $this->barang_id[$i] = null;
        $this->jumlah[$i] = null;
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function resetInput()
    {
        $this->user_id = null;
        $this->barang_id = null;
        $this->jumlah = null;
        $this->inputs = [];
    }

    public function store()
    {
        $validatedDate = $this->validate(
            [
                'user_id' => 'required',
                'barang_id.0' => 'required',
                'jumlah.0' => 'required|not_in:0',
                'user_id.*' => 'required',
                'barang_id.*' => 'required',
                'jumlah.*' => 'required|not_in:0',
            ],
            [
                'user_id.required' => 'Pengambil Harus Di isi',
                'barang_id.0.required' => 'Barang Harus Di isi',
                'jumlah.0.required' => 'Jumlah Harus Di isi',
                'jumlah.0.not_in:0' => 'Jumlah melebihi stock barang',
                'user_id.*.required' => 'Pengambil Harus Di isi',
                'barang_id.*.required' => 'Barang Harus Di isi',
                'jumlah.*.required' => 'Jumlah Harus Di isi',
                'jumlah.*.not_in:0' => 'Jumlah melebihi stock barang',
            ]
        );

        foreach ($this->barang_id as $key => $value) {
            $cek = Barang::where('id', $this->barang_id[$key])->first();
            if ($this->jumlah[$key] > $cek->stock) {
                $this->alert('error', 'Stock ' . $cek->nama_barang . ' tidak cukup');
                // $this->jumlah[$key] = 0;
                break;
            } else {
                $ambil = Pengambilan::create([
                    'user_id' => $this->user_id,
                    'barang_id' => $this->barang_id[$key],
                    'jumlah' => $this->jumlah[$key],
                ]);
                // $cek->update([
                //     'stock' => (int)$cek->stock - (int)$this->jumlah[$key],
                // ]);

                $this->inputs = [];
                $this->alert('success', ' Berhasil ');
                // $this->resetInput();
                return redirect()->route('pengambilan');
            }
        }

        // if ($this->sisa == 0) {
        //     foreach ($this->barang_id as $key => $value) {
        //         $cek = Barang::where('id', $this->barang_id[$key])->first();
        //         if ($this->jumlah[$key] > $cek->stock) {
        //             $this->alert('error', 'Stock ' . $cek->nama_barang . ' tidak cukup');
        //         };
        //     }
        // } else {
        //     $this->sisa = 1;
        // }

        // if ($this->sisa == 1) {
        //     foreach ($this->barang_id as $key => $value) {
        //         $cek = Barang::where('id', $this->barang_id[$key])->first();
        //         $ambil = Pengambilan::create([
        //             'user_id' => $this->user_id,
        //             'barang_id' => $this->barang_id[$key],
        //             'jumlah' => $this->jumlah[$key],
        //         ]);
        //         $cek->update([
        //             'stock' => (int)$cek->stock - (int)$this->jumlah[$key],
        //         ]);
        //         $this->alert('success', ' Berhasil ');
        //     }
        // } else {
        //     $this->sisa = 0;
        // }







        // pengambilan
        // session()->flash('message', 'Account Added Successfully.');
    }

    protected $rules = [
        'user_id' => 'required',
        'jumlah' => 'required',
        'barang_id' => 'required',
    ];
}
