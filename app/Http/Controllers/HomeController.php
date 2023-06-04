<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pembelian;
use App\Models\Pengambilan;
use App\Models\Suplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
    public function index(Request $request)
    {
        $tittle = 'Dashboard';
        $Suplier = Suplier::all()->count();
        $Pengambilan = Pengambilan::where('tanggal', now()->format('d-m-Y'))->count();
        $Pembelian = Pembelian::where('tanggal', now()->format('d-m-Y'))->sum('total');




        $admin = User::all()->count();
        $masuk = Layanan::where('tanggal', now()->format('d-m-Y'))->sum('total');
        $keluar = Pembelian::where('tanggal', now()->format('d-m-Y'))->sum('total');
        if ($request->waktu == 1) {
            # code...
            $waktu = Carbon::now()->subDays(7);
        } elseif ($request->waktu == 2) {
            $waktu = Carbon::now()->subMonth();
            # code...
        } elseif ($request->waktu == 3) {
            $waktu = Carbon::now()->subMonths(3);
            # code...
        } elseif ($request->waktu == 4) {
            $waktu = Carbon::now()->subMonths(6);
            # code...
        } elseif ($request->waktu == 5) {
            $waktu = Carbon::now()->subYear();
            # code...
        } else {
            $waktu = Carbon::now()->subDays(7);
        }

        // $last7Days = ;



        $p_masuk = Layanan::where('created_at', '>=', $waktu)->pluck('created_at')->toArray();
        $p_keluar = Pembelian::where('created_at', '>=', $waktu)->pluck('created_at')->toArray();
        $d_masuk = [];
        $d_keluar = [];
        // $r_masuk=Layanan::query();
        // $r_keluar=Layanan::query();

        // Menggabungkan dua array
        $mergedArray = array_merge($p_masuk, $p_keluar);

        // Menghapus duplikat tanggal
        $uniqueDates = array_unique(array_map(function ($datetime) {
            return substr($datetime, 0, 10); // Mengambil tanggal (YYYY-MM-DD)
        }, $mergedArray));

        // Mengurutkan array
        sort($uniqueDates);

        foreach ($uniqueDates as $key) {
            # code...
            $r_masuk = Layanan::whereDate('created_at', $key)->get();
            // dd($key);
            if ($r_masuk->count() > 0) {
                # code...
                array_push($d_masuk, number_format($r_masuk->sum('total'), 3, '.', ''));
            } else {
                array_push($d_masuk, 0);
            }
        }
        foreach ($uniqueDates as $key) {
            # code...
            $r_keluar = Pembelian::whereDate('created_at', $key)->get();
            // dd($key);
            if ($r_keluar->count() > 0) {
                # code...
                array_push($d_keluar, number_format($r_keluar->sum('total'), 3, '.', ''));
            } else {
                array_push($d_keluar, 0);
            }
        }

        $formattedArray = array_map(function ($datetime) {
            return Carbon::parse($datetime)->toISOString();
        }, $uniqueDates);

        // dd($d_masuk);

        // $carbonDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $p_masuk->created_at);
        // $isoDateTime = $carbonDateTime->utc()->toIso8601String();
        // dd($isoDateTime);
        return view('home', compact('tittle', 'masuk', 'keluar', 'admin', 'Suplier', 'Pengambilan', 'Pembelian', 'd_masuk', 'd_keluar', 'formattedArray'));
    }
}
