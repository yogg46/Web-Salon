<?php

namespace App\Http\Livewire\Kasir;

use App\Models\Jasa;
use App\Models\Kategori;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class JasaController extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $select = 1;
    public $select2 = '';
    public $cek;
    public $cek1;
    public function render()
    {
        return view('livewire.kasir.jasa-controller', [
            'jasa' => Jasa::search('kategori_id', $this->select2)->orderBy('updated_at','DESC')->paginate(10),
            'kat' => Kategori::all()
        ])->extends(
            'layouts.main',
            [
                'tittle' => 'Jasa',
                'slug1' => ''
            ]
        )
            ->section('isi');
    }
    protected $listeners = ['some-event' => '$refresh'];
    public function cekL()
    {
        $this->alert('success', 'Data Berhasil Disimpan');
        $this->emit('close-modal');
        // $this->emit('close');
        // $this->dispatchBrowserEvent('close-modal');
    }

    public $kategori,$nama_jasa,$kategori_id,$harga;

    public function saveKategori()
    {
        $this->validate([
            'kategori' => 'required',
        ]);

        $simpan = new Kategori;
        $simpan->kategori = $this->kategori;

        $simpan->save();
        return redirect()->route('jasa');
    }

    public function saveJasa()
    {
        $this->validate([
            'kategori_id' => 'required',
            'nama_jasa' => 'required',
            'harga' => 'required',

        ]);

        Jasa::create([
            'nama_jasa' => $this->nama_jasa,
            'kategori_id' => $this->kategori_id,
            'harga' => $this->harga,

        ]);

        // $simpan->save();
        return redirect()->route('jasa');
    }
}
