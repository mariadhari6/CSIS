<?php

namespace App\Exports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class CompanyExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Company::all();
    }

    public function map($company): array
    {
        return [
            $company->company_name,
            $company->seller_id,
            $company->customer_code,
            $company->no_agreement_letter_id,
            $company->status


        ];
    }

    public function headings(): array
    {
        return [
            // '#',
            'Company Name',
            'Seller Name',
            'Customer Code',
            'No Agreement Letter',
            'Status'

        ];
    }

    public function  registerEvents(): array
    {

        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:E1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
            },


        ];
    }
}
