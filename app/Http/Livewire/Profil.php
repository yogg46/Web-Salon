<?php

namespace App\Http\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Jantinnerezo\LivewireAlert\LivewireAlert;



use Livewire\Component;

class Profil extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $password, $password_confirmation;

    public function mount()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.profil')->extends(
            'layouts.main',
            [
                'tittle' => 'Profil',
                'slug1' => ''
            ]
        )
            ->section('isi');
    }

    public function UpdatePro()
    {
        $this->validate([
            'name' => 'required|min:6|regex:/^[a-zA-Z ]*$/',
            'email' => 'required|email',
        ]);
            $User = User::find(Auth::user()->id);
            $User->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->alert('success', 'Profil Berhasil Diupdate');
            // $this->resetInput();
            // return redirect()->route('profil.index');

    }
    public function gantiPass()
    {
        $this->validate([
            'password' => 'required|confirmed|min:6',
        ]);
            $User = User::find(Auth::user()->id);
            $User->update([
                'password' => bcrypt($this->password),
            ]);
            $this->alert('success', 'Password Berhasil Diupdate');
            $this->resetInputPass();
            // return redirect()->route('logout');

    }

    public function resetInputPass()
    {
        $this->password = null;
        $this->password_confirmation = null;
    }
    public function resetInput()
    {
        $this->name = null;
        $this->email = null;
    }
}
