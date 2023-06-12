<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class pengeluaran implements FromView, WithHeadings, WithStyles, ShouldAutoSize,WithTitle
{
     protected $layanans;
    protected $month;
    public function title(): string
    {
        return $this->month;
    }
    public function __construct($layanans, $month)
    {
        $this->layanans = $layanans;
        $this->month = $month;
    }

    public function view(): View
    {
        $layanans = $this->layanans;
        $total = 0;

        foreach ($layanans as $layanan) {
            foreach ($layanan->pembelianRelasiDetail as $detail) {
                $total += $detail->subtotal;
            }
        }

        return view('export.export-pengeluaran', [
            'layanans' => $layanans,
            'month' => $this->month,
            'total' => $total,
        ]);
    }

    public function headings(): array
    {
        return [
            'No',
            'MANUFAKTUR',
            'TANGGAL',
            'PETUGAS GUDANG',
            'SUPLIER',
            'BARANG',
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
                'size' => 16,
            ],
        ];

        $sheet->getStyle('A1:H1')->applyFromArray($styleArray);

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

        $sheet->getStyle('A2:H2')->applyFromArray($styleArray);

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

        $sheet->getStyle("A3:H{$lastRow}")->applyFromArray($styleArray);
    }
}
