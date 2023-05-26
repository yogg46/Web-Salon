<?php

namespace App\Http\Controllers;

use App\Exports\laporan;
use App\Exports\laporanAll;
use App\Exports\LayananExport;
use App\Exports\LayananExportAll;
use App\Exports\MultiSheetExport;
use App\Exports\pengeluaran;
use App\Exports\pengeluaranall;
use App\Exports\penglain;
use App\Exports\penglainAll;
use App\Models\Layanan;
use App\Models\Pembelian;
use App\Models\pengeluaranlain;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcel extends Controller
{
    public function export()
    {
        $layanans = Layanan::orderBy('created_at')->get();
        $months = [];
        $exports = [];

        // Group Layanan by month
        foreach ($layanans as $layanan) {
            $month = $layanan->created_at->format('M Y');
            if (!isset($months[$month])) {
                $months[$month] = [];
            }
            $months[$month][] = $layanan;
        }

        // Create LayananExport for each month
        foreach ($months as $month => $layanans) {
            $exports[] = new LayananExport($layanans, $month);
        }

        // Create MultiSheetExport with LayananExport objects
        $multiSheetExport = new MultiSheetExport($exports);

        return Excel::download($multiSheetExport, 'Pemasukan_Perbulan.xlsx');
        // return Excel::download(new LayananExport(), 'Laporan Layanan.xlsx');
    }

    public function exportall()
    {
        $layanans = Layanan::all();
        $export = new LayananExportAll($layanans);

        return Excel::download($export, 'Seluruh_Pemasukan.xlsx');
    }
    public function exportbulan($id)
    {
        $layanans = Layanan::whereMonth('created_at', $id)->get();
        $export = new LayananExportAll($layanans);
        $nama = $id == '01' ? 'Januari' : ($id == '02' ? 'Februari' : ($id ==
            '03' ?
            'Maret' : ($id == '04' ? 'April' : ($id == '05' ? 'Mei' : ($id
                ==
                '06' ? 'Juni' : ($id == '07' ? 'Juli' : ($id == '08' ? 'Agustus' : ($id == '09' ? 'September' : ($id == '10' ? 'Oktober' : ($id ==
                    '11'
                    ? 'November' : 'Desember'))))))))));

        return Excel::download($export, 'Pemasukan_' . $nama . '.xlsx');
    }
    public function exportall_pengeluaran()
    {
        $layanans = Pembelian::all();
        $export = new pengeluaranall($layanans);

        return Excel::download($export, 'Seluruh_Pengeluaran.xlsx');
    }
    public function exportbulan_pengeluaran($id)
    {
        $layanans = Pembelian::whereMonth('created_at', $id)->get();
        $export = new pengeluaranall($layanans);
        $nama = $id == '01' ? 'Januari' : ($id == '02' ? 'Februari' : ($id ==
            '03' ?
            'Maret' : ($id == '04' ? 'April' : ($id == '05' ? 'Mei' : ($id
                ==
                '06' ? 'Juni' : ($id == '07' ? 'Juli' : ($id == '08' ? 'Agustus' : ($id == '09' ? 'September' : ($id == '10' ? 'Oktober' : ($id ==
                    '11'
                    ? 'November' : 'Desember'))))))))));

        return Excel::download($export, 'Pengeluaran_' . $nama . '.xlsx');
    }
    public function exportall_pengeluaran_lain()
    {
        $layanans = pengeluaranlain::all();
        $export = new penglainAll($layanans);

        return Excel::download($export, 'Seluruh_Pengeluaran_Lain.xlsx');
    }
    public function exportbulan_pengeluaran_lain($id)
    {
        $layanans = pengeluaranlain::whereMonth('created_at', $id)->get();
        $export = new penglainAll($layanans);
        $nama = $id == '01' ? 'Januari' : ($id == '02' ? 'Februari' : ($id ==
            '03' ?
            'Maret' : ($id == '04' ? 'April' : ($id == '05' ? 'Mei' : ($id
                ==
                '06' ? 'Juni' : ($id == '07' ? 'Juli' : ($id == '08' ? 'Agustus' : ($id == '09' ? 'September' : ($id == '10' ? 'Oktober' : ($id ==
                    '11'
                    ? 'November' : 'Desember'))))))))));

        return Excel::download($export, 'Pengeluaran_Lain_' . $nama . '.xlsx');
    }
    public function exportbulan_laporan($id)
    {
        $penjualan_jasa = Layanan::with('layananRelasiDetail')->whereMonth('created_at', $id)->get();
        $masuk = $penjualan_jasa;

        $pembelian_barang = Pembelian::with('pembelianRelasiDetail')->whereMonth('created_at', $id)->get();
        $keluar1 = $pembelian_barang;


        $lain = pengeluaranlain::whereMonth('created_at', $id)->get();
        $keluar2 = $lain;
        $nama = $id == '01' ? 'Januari' : ($id == '02' ? 'Februari' : ($id ==
            '03' ?
            'Maret' : ($id == '04' ? 'April' : ($id == '05' ? 'Mei' : ($id
                ==
                '06' ? 'Juni' : ($id == '07' ? 'Juli' : ($id == '08' ? 'Agustus' : ($id == '09' ? 'September' : ($id == '10' ? 'Oktober' : ($id ==
                    '11'
                    ? 'November' : 'Desember'))))))))));


        $hasil = [];

        foreach ($masuk as $pj) {
            $tgl = $pj->tanggal->format('Y-m-d');

            $keterangan = [];
            foreach ($pj->layananRelasiDetail as $key) {
                $keterangan[] = $key->detailRelasiJasa->jasaRelasiKategori->kategori . ' - ' . $key->detailRelasiJasa->nama_jasa . ' x ' . $key->jumlah;
            }
            $keterangan_string = implode(", ", $keterangan);
            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pj->layananRelasiUser->name,
                'keterangan' => $keterangan_string,
                'kas_masuk' => $pj->layananRelasiDetail->sum('subtotal'),
                'kas_keluar' => null,

            ];
        }

        foreach ($keluar1 as $pb) {
            $tgl = $pb->tanggal->format('Y-m-d');
            $keterangan = [];
            foreach ($pb->pembelianRelasiDetail as $key) {
                $keterangan[] = $key->detailRelasiBarang->nama_barang . ' x ' . $key->jumlah;
            }
            $keterangan_string = implode(", ", $keterangan);
            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pb->pembelianRelasiUser->name,
                'keterangan' => $keterangan_string,
                'kas_masuk' => null,
                'kas_keluar' => $pb->pembelianRelasiDetail->sum('subtotal')

            ];
        }

        foreach ($keluar2 as $pl) {
            $tgl = $pl->tanggal->format('Y-m-d');

            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pl->kasir->name,
                'keterangan' => $pl->keterangan,
                'kas_masuk' => null,
                'kas_keluar' => $pl->total,
            ];
        }

        $hasil = collect($hasil)->sortBy(function ($item, $key) {
            return $key;
        })->all();


        $layanans = $hasil;
        $export = new laporanAll($layanans);

        return Excel::download($export, 'Laporan_' . $nama . '.xlsx');
    }
    public function exportall_laporan()
    {
        $penjualan_jasa = Layanan::with('layananRelasiDetail')->get();
        $masuk = $penjualan_jasa;

        $pembelian_barang = Pembelian::with('pembelianRelasiDetail')->get();
        $keluar1 = $pembelian_barang;


        $lain = pengeluaranlain::all();
        $keluar2 = $lain;


        $hasil = [];

        foreach ($masuk as $pj) {
            $tgl = $pj->tanggal->format('Y-m-d');

            $keterangan = [];
            foreach ($pj->layananRelasiDetail as $key) {
                $keterangan[] = $key->detailRelasiJasa->jasaRelasiKategori->kategori . ' - ' . $key->detailRelasiJasa->nama_jasa . ' x ' . $key->jumlah;
            }
            $keterangan_string = implode(", ", $keterangan);
            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pj->layananRelasiUser->name,
                'keterangan' => $keterangan_string,
                'kas_masuk' => $pj->layananRelasiDetail->sum('subtotal'),
                'kas_keluar' => null,

            ];
        }

        foreach ($keluar1 as $pb) {
            $tgl = $pb->tanggal->format('Y-m-d');
            $keterangan = [];
            foreach ($pb->pembelianRelasiDetail as $key) {
                $keterangan[] = $key->detailRelasiBarang->nama_barang . ' x ' . $key->jumlah;
            }
            $keterangan_string = implode(", ", $keterangan);
            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pb->pembelianRelasiUser->name,
                'keterangan' => $keterangan_string,
                'kas_masuk' => null,
                'kas_keluar' => $pb->pembelianRelasiDetail->sum('subtotal')

            ];
        }

        foreach ($keluar2 as $pl) {
            $tgl = $pl->tanggal->format('Y-m-d');

            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pl->kasir->name,
                'keterangan' => $pl->keterangan,
                'kas_masuk' => null,
                'kas_keluar' => $pl->total,
            ];
        }

        $hasil = collect($hasil)->sortBy(function ($item, $key) {
            return $key;
        })->all();


        $layanans = $hasil;
        $export = new laporanAll($layanans);

        return Excel::download($export, 'Seluruh_Laporan.xlsx');
    }

    public function export_pengeluaran()
    {
        $layanans = Pembelian::orderBy('created_at')->get();
        $months = [];
        $exports = [];

        // Group Layanan by month
        foreach ($layanans as $layanan) {
            $month = $layanan->created_at->format('M Y');
            if (!isset($months[$month])) {
                $months[$month] = [];
            }
            $months[$month][] = $layanan;
        }

        // Create LayananExport for each month
        foreach ($months as $month => $layanans) {
            $exports[] = new pengeluaran($layanans, $month);
        }

        // dd($months);
        // Create MultiSheetExport with LayananExport objects
        $multiSheetExport = new MultiSheetExport($exports);

        return Excel::download($multiSheetExport, 'Pengeluaran_Perbulan.xlsx');
    }


    public function export_pengeluaran_lain()
    {
        $layanans = pengeluaranlain::orderBy('created_at')->get();
        $months = [];
        $exports = [];

        // Group Layanan by month
        foreach ($layanans as $layanan) {
            $month = $layanan->created_at->format('M Y');
            if (!isset($months[$month])) {
                $months[$month] = [];
            }
            $months[$month][] = $layanan;
        }

        // Create LayananExport for each month
        foreach ($months as $month => $layanans) {
            $exports[] = new penglain($layanans, $month);
        }

        // Create MultiSheetExport with LayananExport objects
        $multiSheetExport = new MultiSheetExport($exports);

        return Excel::download($multiSheetExport, 'Pengeluaran_Lain_Perbulan.xlsx');
    }
    public function export_laporan()
    {

        $penjualan_jasa = Layanan::with('layananRelasiDetail')->get();
        $masuk = $penjualan_jasa;

        $pembelian_barang = Pembelian::with('pembelianRelasiDetail')->get();
        $keluar1 = $pembelian_barang;


        $lain = pengeluaranlain::all();
        $keluar2 = $lain;


        $hasil = [];

        foreach ($masuk as $pj) {
            $tgl = $pj->tanggal->format('Y-m-d');

            $keterangan = [];
            foreach ($pj->layananRelasiDetail as $key) {
                $keterangan[] = $key->detailRelasiJasa->jasaRelasiKategori->kategori . ' - ' . $key->detailRelasiJasa->nama_jasa . ' x ' . $key->jumlah;
            }
            $keterangan_string = implode(", ", $keterangan);
            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pj->layananRelasiUser->name,
                'keterangan' => $keterangan_string,
                'kas_masuk' => $pj->layananRelasiDetail->sum('subtotal'),
                'kas_keluar' => null,

            ];
        }

        foreach ($keluar1 as $pb) {
            $tgl = $pb->tanggal->format('Y-m-d');
            $keterangan = [];
            foreach ($pb->pembelianRelasiDetail as $key) {
                $keterangan[] = $key->detailRelasiBarang->nama_barang . ' x ' . $key->jumlah;
            }
            $keterangan_string = implode(", ", $keterangan);
            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pb->pembelianRelasiUser->name,
                'keterangan' => $keterangan_string,
                'kas_masuk' => null,
                'kas_keluar' => $pb->pembelianRelasiDetail->sum('subtotal')

            ];
        }

        foreach ($keluar2 as $pl) {
            $tgl = $pl->tanggal->format('Y-m-d');

            $hasil[$tgl][] = [
                'Tanggal' => $tgl,
                'pegawai' => $pl->kasir->name,
                'keterangan' => $pl->keterangan,
                'kas_masuk' => null,
                'kas_keluar' => $pl->total,
            ];
        }

        $hasil = collect($hasil)->sortBy(function ($item, $key) {
            return $key;
        })->all();

        $layanans = $hasil;
        $months = [];
        $exports = [];

        foreach ($layanans as $tanggal => $layanan) {
            $month = date('M Y', strtotime($tanggal));
            $lek = [];
            // dd($tanggal);
            if (!isset($months[$month])) {
                $months[$month] = [];
            }
            if (!isset($lay[$tanggal])) {
                $lay[$tanggal] = [];
            }
            if (!isset($lek[$tanggal])) {
                $lek[$tanggal] = [];
            }
            $lay[$tanggal] = array_merge($lay[$tanggal], $layanan);
            $lek[$tanggal] = array_merge($lek[$tanggal], $lay[$tanggal]);
            $months[$month] = array_merge($months[$month], $lek);
        }
        // Create LayananExport for each month
        foreach ($months as $month => $layanans) {
            $exports[] = new laporan($layanans, $month);
        }
        // dd($months);
        // dd($exports);

        // Create MultiSheetExport with LayananExport objects
        $multiSheetExport = new MultiSheetExport($exports);

        return Excel::download($multiSheetExport, 'Laporan_Perbulan.xlsx');
    }
}
