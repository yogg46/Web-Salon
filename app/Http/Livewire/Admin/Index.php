<?php

namespace App\Http\Livewire\Admin;

use App\Mail\ResetPassword;
use App\Mail\SendEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Nette\Utils\Random;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search = '';
    public $select;
    public $select2;
    public $name;
    // public $username;
    public $email;
    public $role;
    public $hide;
    public $ids;
    public $User;
    protected $listeners = ['delete', 'resetpass'];

    public $cc = '';


    protected $rules = [
        'name' => 'required|min:6|regex:/^[a-zA-Z ]*$/',
        // 'username' => 'required|regex:/^\S*$/u|unique:users',
        'email' => 'required|email|unique:users',
        'role' => 'required',
    ];

    public function render()
    {


        return view('livewire.admin.index', [

            'user' => User::search('name', $this->search)
                ->search('role', $this->select)
                ->search('status', $this->select2)
                ->orderBy('created_at', 'desc')
                ->paginate(10),


        ])
            ->extends(
                'layouts.main',
                [
                    'tittle' => 'User',
                    'slug1' => ''
                ]
            )
            ->section('isi');
    }

    public function isopen()
    {
        $this->cc = 'block';
    }
    public function isclose()
    {
        $this->cc = 'none';
    }




    public function save()
    {
        $this->validate([
            'name' => 'required|min:6|regex:/^[a-zA-Z ]*$/',
            // 'username' => 'required|regex:/^\S*$/u|unique:users',
            'email' => 'required|email|unique:users',
            'role' => 'required',
        ]);

        $simpan = new User;
        $pss =  Str::random(20);
        $simpan->name = $this->name;
        $simpan->password = Hash::make($pss);
        // $simpan->username = $this->username;
        $simpan->role = $this->role;
        $simpan->email = $this->email;


        $data = [
            'name' => $this->name,
            'password' => $pss,
            'email' => $this->email,
        ];

        Mail::to($this->email)->send(new SendEmail($data));

        $simpan->save();
        // session()->alert('message', 'Data Berhasil Disimpan.');
        $this->emit('closeModal');
        // $this->dispatchBrowserEvent('closeModal');
        $this->alert('success', 'Data Berhasil Disimpan');
        $this->resetInput();
        // $this->doClose();

        // $this->ceklis = [];

        //redirect
        return redirect()->route('user');
    }


    public function resetInput()
    {
        $this->name = null;
        // $this->username = null;
        $this->email = null;
        $this->role = null;
        $this->isclose();
        // $this->hide = "hide";
        // $this->flash('success', 'Successfully submitted form', [], '');
        // return redirect()->route('karyawan.index');
    }
    public function konfimasiDEL($id)
    {
        $nama = User::where('id', $id)->get();
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Apakah anda yakin akan menghapus ' . $nama[0]->name . '?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $User = User::where('id', $id)->first();
        User::where('id', $id)->delete();

        $this->alert('success', 'User ' . $User->name . ' Berhasil Dihapus');
    }
    public function edit($id)
    {
        $User = User::where('id', $id)->first();
        $this->ids = $User->id;
        $this->name = $User->name;
        $this->email = $User->email;
        $this->role = $User->role;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|min:6|regex:/^[a-zA-Z ]*$/',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        if ($this->ids) {
            $User = User::find($this->ids);
            $User->update([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
            ]);

            // session()->flash('message', 'User Berhasil Diupdate.');
            $this->alert('success', 'User Berhasil Diupdate');
            $this->resetInput();
            // $this->ceklis = [];
            // $this->emit('edit');

            //redirect
            return redirect()->route('user');
        }
    }

    public function resetpass($id)
    {
        // $this->emit('resetpass');

        $User = User::where('id', $id)->first();
        $this->ids = $User->id;
        // $this->status = $User->status;
        $User = User::find($this->ids);
        $pss =  Str::random(20);
        $User->update([
            'status' => 1,
            'password' =>  Hash::make($pss),
        ]);
        $data = [
            'name' => $User->name,
            'password' => $pss,
            'email' => $User->email,
        ];

        Mail::to($User->email)->send(new ResetPassword($data));

        $this->alert('success', 'Password ' . $User->name . ' Berhasil Direset');
        // return redirect()->route('karyawan.index');
    }

    public function konfimasiReset($id)
    {
        $nama = User::where('id', $id)->get();
        $this->dispatchBrowserEvent('swal:confirmpass', [
            'type' => 'warning',
            'title' => 'Apakah anda yakin akan mereset ' . $nama[0]->name . '?',
            'text' => '',
            'id' => $id,
        ]);
    }
}
