<?php

namespace App\Exports;

use App\Models\Layanan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class LayananExportAll implements FromView, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $layanans;

    public function __construct($layanans)
    {
        $this->layanans = $layanans;
    }

    public function view(): View
    {
        $layanans = $this->layanans;
        $total = 0;

        foreach ($layanans as $layanan) {
            foreach ($layanan->layananRelasiDetail as $detail) {
                $total += $detail->subtotal;
            }
        }

        return view('export.export', [
            'layanans' => $layanans,
            'total' => $total,
        ]);
    }

    public function headings(): array
    {
        return [
            'No',
            'MANUFAKTUR',
            'TANGGAL',
            'KASIR',
            'LAYANAN',
            'JUMLAH',
            'SUBTOTAL',
        ];
    }


    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ],
        ];

        $sheet->getStyle('A1:G1')->applyFromArray($styleArray);

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $sheet->getStyle("A1:G{$lastRow}")->applyFromArray($styleArray);
    }
}
