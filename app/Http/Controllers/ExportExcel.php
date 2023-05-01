<?php

namespace App\Http\Controllers;

use App\Exports\LayananExport;
use App\Exports\LayananExportAll;
use App\Exports\MultiSheetExport;
use App\Models\Layanan;
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

        return Excel::download($export, 'Seleruh_Pemasukan.xlsx');
    }
}
