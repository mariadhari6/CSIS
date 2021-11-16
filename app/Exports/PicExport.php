<?php

namespace App\Exports;

use App\Models\Pic;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class PicExport implements FromCollection, WithEvents, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pic::with('company')->get();
    }

    public function map($pic): array
    {
        return [
            $pic->company->company_name,
            $pic->pic_name,
            $pic->phone,
            $pic->email,
            $pic->position,
            Carbon::parse($pic->date_of_birth)->toFormattedDateString(),
        ];
    }

    public function headings(): array
    {
        return [
            // '#',
            'Company Name',
            'Pic Name',
            'Phone',
            'Email',
            'Position',
            'Date Of Birth'


        ];
    }

    public function  registerEvents(): array
    {

        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:F1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
            },

        ];
    }
}
