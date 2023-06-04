<?php

namespace App\Http\Livewire\Gudang;

use App\Models\Jasa;
use App\Models\Suplier;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class SuplierController extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search = '';
    public $nama_suplier, $alamat, $ids;
    protected $listeners = ['delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function resetPage()
    {
        $this->gotoPage(1);
    }
    public function render()
    {
        return view('livewire.gudang.suplier-controller', [
            'suplier' => Suplier::search('nama_suplier', $this->search)->whereLike('alamat', $this->search)->orderBy('created_at', 'desc')->paginate(10),
        ])->extends(
            'layouts.main',
            [
                'tittle' => 'Suplier',
                'slug1' => ''
            ]
        )
            ->section('isi');
    }
    public function resetInput()
    {
        $this->nama_suplier = null;
        $this->alamat = null;
        $this->ids = null;
    }
    public function save()
    {
        $this->validate([
            'nama_suplier' => 'required',
            'alamat' => 'required',

        ],[
            'nama_suplier.required' => 'Kolom nama suplier wajib diisi',
            'alamat.required' => 'Kolom alamat suplie wajib diisi',
        ]);

        $simpan = new Suplier;

        $simpan->nama_suplier = $this->nama_suplier;
        $simpan->alamat = $this->alamat;

        $simpan->save();
        $this->alert('success', 'Data Berhasil Disimpan');
        $this->resetInput();

        return redirect()->route('suplier');
    }

    public function edit($id)
    {

        $sup = Suplier::where('id', $id)->first();
        $this->nama_suplier = $sup->nama_suplier;
        $this->alamat = $sup->alamat;
        $this->ids = $id;
    }
    public function update()
    {
        $this->validate([
            'nama_suplier' => 'required',
            'alamat' => 'required',

        ],[
            'nama_suplier.required' => 'Kolom nama suplier wajib diisi',
            'alamat.required' => 'Kolom alamat suplie wajib diisi',
        ]);

        $sup = Suplier::where('id', $this->ids)->first();

        $sup->update([
            'nama_suplier' => $this->nama_suplier,
            'alamat' => $this->alamat,
        ]);

        return redirect()->route('suplier');
    }

    public function kon($id)
    {
        $nama = Suplier::where('id', $id)->get();
        $this->dispatchBrowserEvent('swal:confirmSuplier', [
            'type' => 'warning',
            'title' => 'Apakah anda yakin akan menghapus ' . $nama[0]->nama_suplier . '?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $User = Suplier::where('id', $id)->first();
        Suplier::where('id', $id)->delete();

        $this->alert('success', 'Suplier ' . $User->nama_suplier . ' Berhasil Dihapus');
    }
}
