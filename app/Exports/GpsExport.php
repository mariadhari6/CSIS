<?php

namespace App\Exports;

use App\Models\Gps;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class GpsExport implements FromCollection, WithEvents, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Gps::with('company')->get();
    }

    public function map($gps): array
    {
        return [
            $gps->merk,
            $gps->type,
            $gps->imei,
            Carbon::parse($gps->waranty)->toFormattedDateString(),
            Carbon::parse($gps->po_date)->toFormattedDateString(),
            $gps->status,
            $gps->status_ownership,
            $gps->company->company_name ?? ''
        ];
    }

    public function headings(): array
    {
        return [
            // '#',
            'Merk Gps',
            'Type Gps',
            'IMEI',
            'Waranty',
            'Po Date',
            'Status',
            'Status Ownership',
            'Company Name'
        ];
    }

    public function  registerEvents(): array
    {

        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:H1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
            },


        ];
    }
}
