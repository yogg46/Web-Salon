<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function index($id,$bayar,$kembalian)
    {
        $data1 = Layanan::where('id', $id)->withSum('layananRelasiDetail','jumlah')->first();
        return view('print2', ['data' => $data1,'bayar'=>$bayar,'kembalian'=>$kembalian]);
    }
}
