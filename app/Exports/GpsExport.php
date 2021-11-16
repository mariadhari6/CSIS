<?php

namespace App\Exports;

use App\Models\Gps;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
class GpsExport implements FromCollection, WithHeadings, WithMapping, WithEvents, ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gps::all();
    }
    public function map($gps) : array {
        return [
            $gps->merk,
            $gps->type,
            $gps->imei,
            $gps->waranty,
            $gps->po_date,
            $gps->status,
            $gps->status_ownership
        ];
    }

    public function headings() : array {
        return [
            'Merk',
            'Type',
            'IMEI',
            'Waranty',
            'Po Date',
            'Status',
            'Status Ownership'
        ];
    }
        public function registerEvents(): array
    {

        return [
            // AfterSheet::class    => function (AfterSheet $event) {
            //     $cellRange = 'A1:G1'; // All headers
            //     $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);


            //     $event->sheet->styleCells(
            //         'A1:F1',
            //         [
            //             'borders' => [
            //                 'outline' => [
            //                     'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
            //                     'color' => ['argb' => 'FFFF0000'],
            //                 ],
            //             ]
            //         ]
            //     );
            // },
            // AfterSheet::class    => function (AfterSheet $event) {
            //     // $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            //     $cellRange = 'A1:G1'; // All headers

            //     $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);

            //     $event->sheet->styleCells(
            //         'A1:G1',
            //         [
            //             'borders' => [
            //                 'allBorders' => [
            //                     'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            //                     'color' => ['argb' => '000000'],
            //                 ],
            //             ],
            //         ]
            //     );
            // },


        ];
    }
}

