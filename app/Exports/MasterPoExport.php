<?php

namespace App\Exports;

use App\Models\MasterPo;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use Maatwebsite\Excel\Concerns\Exportable;

class MasterPoExport implements FromCollection, WithHeadings, WithMapping, WithEvents, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return MasterPo::with('sales', 'company')->get();
    }
    public function map($po): array
    {
        return [
            $po->company->company_name,
            $po->po_number,
            Carbon::parse($po->po_date)->toFormattedDateString(),
            $po->harga_layanan,
            $po->jumlah_unit_po,
            $po->status_po,
            $po->sales->name ?? ''


        ];
    }

    public function headings(): array
    {
        return [
            // '#',
            'Company Name',
            'Po Number',
            'Po Date',
            'Harga Layanan',
            'Jumlah Unit PO',
            'Status PO',
            'Sales'

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
