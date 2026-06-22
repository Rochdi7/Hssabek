<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class TenantDataSheet implements FromArray, WithHeadings, WithTitle, WithStyles, ShouldAutoSize
{
    public function __construct(
        private readonly string $title,
        private readonly array  $headings,
        private readonly array  $rows
    ) {}

    public function title(): string
    {
        return mb_substr($this->title, 0, 31);
    }

    public function headings(): array
    {
        return $this->headings;
    }

    public function array(): array
    {
        return $this->rows;
    }

    public function styles(Worksheet $sheet): array
    {
        $lastCol = $sheet->getHighestColumn();
        $lastRow = $sheet->getHighestRow();

        // Bold white header on dark background
        $sheet->getStyle('A1:' . $lastCol . '1')->applyFromArray([
            'font' => [
                'bold'  => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size'  => 11,
            ],
            'fill' => [
                'fillType'   => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '1F2937'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Light background for all data rows in one pass
        if ($lastRow > 1) {
            $sheet->getStyle('A2:' . $lastCol . $lastRow)->applyFromArray([
                'fill' => [
                    'fillType'   => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'F9FAFB'],
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ]);
        }

        // Border on entire table
        if ($lastRow > 0) {
            $sheet->getStyle('A1:' . $lastCol . $lastRow)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color'       => ['rgb' => 'D1D5DB'],
                    ],
                ],
            ]);
        }

        // Header row taller
        $sheet->getRowDimension(1)->setRowHeight(22);

        // Freeze header
        $sheet->freezePane('A2');

        return [];
    }
}
