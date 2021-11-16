<?php

namespace App\Exports;

use App\Models\Seller;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Exportable;

class SellerExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Seller::all();
    }
    public function map($seller): array
    {
        return [
            $seller->seller_name,
            $seller->seller_code,
            $seller->no_agreement_letter,
            $seller->status



        ];
    }

    public function headings(): array
    {
        return [
            // '#',
            'Seller Name',
            'Seller Code',
            'No Agreement Letter',
            'Status'


        ];
    }

    public function  registerEvents(): array
    {

        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:D1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
            },


        ];
    }
}
