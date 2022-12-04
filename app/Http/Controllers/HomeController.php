<?php

namespace App\Http\Controllers;
use App\Models\Layanan;
use App\Models\Pembelian;
use App\Models\Pengambilan;
use App\Models\Suplier;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tittle = 'Dashboard';
        $Suplier = Suplier::all()->count();
        $Pengambilan = Pengambilan::where('tanggal',now()->format('d-m-Y'))->count();
        $Pembelian = Pembelian::where('tanggal',now()->format('d-m-Y'))->sum('total');

        $admin = User::all()->count();
        $masuk = Layanan::where('tanggal',now()->format('d-m-Y'))->sum('total');
        $keluar = Pembelian::where('tanggal',now()->format('d-m-Y'))->sum('total');
        return view('home', compact('tittle','masuk','keluar','admin','Suplier','Pengambilan','Pembelian'));
    }
}
