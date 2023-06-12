<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ambil implements FromView, WithHeadings, WithStyles, ShouldAutoSize
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

        // foreach ($layanans as $layanan) {

        //     $total += $layanan->total;
        // }

        return view('export.export-ambil', [
            'layanans' => $layanans,
            'total' => $total,
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'TANGGAL',
            'BARANG',
            'JUMLAH',
            'PENGAMBIL',

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
                'size' => 16,
            ],
        ];

        $sheet->getStyle('A1:E1')->applyFromArray($styleArray);
        
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
        $sheet->getStyle('A2:E2')->applyFromArray($styleArray);

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

        $sheet->getStyle("A3:E{$lastRow}")->applyFromArray($styleArray);
    }
}
