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

    public function updatingselect2()
    {
        $this->resetPage();
    }

    public function resetPage()
    {
        $this->gotoPage(1);
    }
    public function render()
    {
        return view('livewire.kasir.jasa-controller', [
            'jasa' => Jasa::search('kategori_id', $this->select2)->orderBy('updated_at', 'DESC')->paginate(10),
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
    protected $listeners = ['some-event' => '$refresh', 'deleteJasa', 'deleteKategori'];
    public function cekL()
    {
        $this->alert('success', 'Data Berhasil Disimpan');
        $this->emit('close-modal');
        // $this->emit('close');
        // $this->dispatchBrowserEvent('close-modal');
    }

    public $kategori, $nama_jasa, $kategori_id, $harga, $idj, $idk;

    public function saveKategori()
    {
        $this->validate([
            'kategori' => 'required',
        ], [
            'kategori.required' => 'Kolom kategori wajib diisi'
        ]);

        $simpan = new Kategori;
        $simpan->kategori = $this->kategori;

        $simpan->save();
        // $this->emit('close-modal');
        $this->dispatchBrowserEvent('closeModal');
        return redirect()->route('jasa');
    }

    public function saveJasa()
    {
        $this->validate([
            'kategori_id' => 'required',
            'nama_jasa' => 'required',
            'harga' => 'required',

        ], [
            'kategori_id.required' => 'Kolom kategori wajib diisi',
            'nama_jasa.required' => 'Kolom nama jasa wajib diisi',
            'harga.required' => 'Kolom kategori wajib diisi',
        ]);

        Jasa::create([
            'nama_jasa' => $this->nama_jasa,
            'kategori_id' => $this->kategori_id,
            'harga' => $this->harga,

        ]);
        return redirect()->route('jasa');
    }

    public function editJasa($id)
    {
        $jas = Jasa::where('id', $id)->first();
        $this->nama_jasa = $jas->nama_jasa;
        $this->harga = $jas->harga;
        $this->kategori_id = $jas->kategori_id;
        $this->idj = $id;
    }

    public function updateJasa()
    {
        $this->validate([
            'kategori_id' => 'required',
            'nama_jasa' => 'required',
            'harga' => 'required',

        ], [
            'kategori_id.required' => 'Kolom kategori wajib diisi',
            'nama_jasa.required' => 'Kolom nama jasa wajib diisi',
            'harga.required' => 'Kolom kategori wajib diisi',
        ]);

        $jas = Jasa::where('id', $this->idj)->first();
        $jas->update([
            'nama_jasa' => $this->nama_jasa,
            'kategori_id' => $this->kategori_id,
            'harga' => $this->harga,
        ]);
        return redirect()->route('jasa');
    }

    public function konJasa($id)
    {
        $nama = Jasa::where('id', $id)->get();
        $this->dispatchBrowserEvent('swal:confirmJasa', [
            'type' => 'warning',
            'title' => 'Apakah anda yakin akan menghapus ' . $nama[0]->nama_jasa . '?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function deleteJasa($id)
    {
        $User = Jasa::where('id', $id)->first();
        Jasa::where('id', $id)->delete();

        $this->alert('success', 'Jasa ' . $User->nama_jasa . ' Berhasil Dihapus');
    }

    public function editKategori($id)
    {
        $kat = Kategori::where('id', $id)->first();
        $this->kategori = $kat->kategori;
        $this->idk = $id;
    }

    public function updateKategori()
    {
        $this->validate([
            'kategori' => 'required',
        ]);

        $kat = Kategori::where('id', $this->idk)->first();
        $kat->update([
            'kategori' => $this->kategori,
        ]);
        return redirect()->route('jasa');
    }
    public function konKategori($id)
    {
        $nama = Kategori::where('id', $id)->get();
        $this->dispatchBrowserEvent('swal:confirmKategori', [
            'type' => 'warning',
            'title' => 'Apakah anda yakin akan menghapus ' . $nama[0]->kategori . '?',
            'text' => '',
            'id' => $id,
        ]);
    }
    public function deleteKategori($id)
    {
        $User = Kategori::where('id', $id)->first();
        Kategori::where('id', $id)->delete();

        $this->alert('success', 'Kategori ' . $User->kategori . ' Berhasil Dihapus');
    }
}
