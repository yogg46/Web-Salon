<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Gudang\Barang;
use App\Models\Barang as ModelsBarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // Membuat koneksi ke printer lokal (pastikan nama printer sesuai)
            $connector = new WindowsPrintConnector("POS58usb");

            // Membuat objek printer dari koneksi
            $printer = new Printer($connector);

            // Mencetak teks ke printer
            $printer->text('aaaaaa');

            // Menggulirkan kertas (opsional)
            $printer->feed();

            // Memutuskan koneksi ke printer
            $printer->close();
            } catch (\Exception $e) {
                // Tangani kesalahan jika ada
                echo "Kesalahan: " . $e->getMessage();
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('Admin.add', ['tittle' => 'Tambah User']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'role' => 'required',
            'password' => 'required|min:8',
        ]);
        $request->merge(['password' => Hash::make($request->input('password'))]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
