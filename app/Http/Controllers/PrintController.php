<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pembelian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller
{
    public function index($id, $bayar, $kembalian)
    {
        $data1 = Layanan::where('id', $id)->withSum('layananRelasiDetail', 'jumlah')->first();
        return view('print2', ['data' => $data1, 'bayar' => $bayar, 'kembalian' => $kembalian]);
    }


    public function coba()
    {





        // $transactions = DB::table('layanans')
        // ->leftJoin('pembelians', DB::raw('DATE(layanans.tanggal)'), '=', DB::raw('DATE(pembelians.tanggal)'))
        // ->select(DB::raw('DATE(layanans.tanggal) as tanggal'), 'layanans.manufaktur', 'layanans.user_id as useridlayanan', 'pembelians.petugas_gudang', 'pembelians.suplier_id', DB::raw('SUM(layanans.total) as totallayanan'), DB::raw('SUM(pembelians.total) as totalpembelian'))
        // ->groupBy(DB::raw('DATE(layanans.tanggal)'), 'layanans.manufaktur', 'layanans.user_id', 'pembelians.petugas_gudang', 'pembelians.suplier_id')
        // ->orderByDesc(DB::raw('DATE(layanans.tanggal)'))
        // ->get();


        $pembelian = Pembelian::all();

        $layanan = Layanan::all();
        $transactions = [];

        if ($layanan->count() >= $pembelian->count()) {
            $loops = $layanan->count();
        } else {
            $loops = $pembelian->count();
        }
        $zipped = $layanan->zip($pembelian);

        $grouped = $zipped->groupBy(function ($row) {
            return Carbon::parse($row[0]->tanggal)->format('d-m-Y');
        });

        foreach ($grouped as $tanggal => $rows) {
            // $tanggal is the value of the tanggal column for the current group
            // $rows is a collection of pairs that have the same tanggal value

            foreach ($rows as $row) {
                array_push($transactions, [$row[0]->tanggal, $row[1]->tanggal ?? null]);
                // $table1_column_value = $row[0]->table1_column_name;
                // $table2_column_value = $row[1]->table2_column_name;

                // do something with the values
            }
        }

        // ============================================
        // $zipped = $layanan->zip($pembelian);

        // foreach ($zipped as $row) {

        //         if(is_null($row[1])){
        //             $tanggalPembelian = null;
        //         }else {

        //             $tanggalPembelian = Carbon::parse($row[1]->tanggal)->format('d-m-Y');
        //         }
        //         if(is_null($row[0])){
        //             $tanggalLayanan = null;
        //         }else {
        //             $tanggalLayanan = Carbon::parse($row[0]->tanggal)->format('d-m-Y');
        //         }
        //             array_push($transactions,  [
        //                 'tanggal' => $tanggalLayanan,
        //                 'tanggal1' => $tanggalPembelian,
        //                 'kasir' => $row[0]->layananRelasiUser->name??null,
        //                 'petugas_gudang' => $row[1]->pembelianRelasiUser->name??null,
        //                 'suplier' => $row[1]->pembelianRelasiSuplier->nama_suplier??null,
        //                 'pemasukan' => $row[0]->id??null,
        //                 'pengeluaran' => $row[1]->total??null

        //             ]);


        // }


        //===========================================
        // foreach ($pembelian as $itemPembelian) {
        //     $tanggalPembelian = Carbon::parse($itemPembelian->tanggal)->format('d-m-Y');

        //     foreach ($layanan as $itemLayanan) {
        //         $tanggalLayanan = Carbon::parse($itemLayanan->tanggal)->format('d-m-Y');

        //         $id = $tanggalLayanan;
        //         if ($tanggalLayanan == $tanggalPembelian) {
        //             if (!isset($transactions[$id])) {
        //                 $transactions[$id] = [];
        //             }
        //             array_push($transactions[$id],  $itemLayanan->manufaktur);
        //         }else{
        //             if (!isset($transactions[$id])) {
        //                 $transactions[$id] = [];
        //             }
        //             array_push($transactions[$id], $itemLayanan->manufaktur);
        //         }
        //     }
        // }



        // array_push()



        return view('coba', ['coba' => $transactions]);
    }
}
