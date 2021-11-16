<?php

namespace App\Exports;

use App\Models\Gsm;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class GsmMasterExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Gsm::with('company')->get();
    }

    public function map($gsm): array
    {
        return [
            $gsm->status_gsm,
            $gsm->gsm_number,
            $gsm->company->company_name ?? '',
            $gsm->serial_number,
            $gsm->icc_id,
            $gsm->imsi,
            $gsm->res_id,
            Carbon::parse($gsm->request_date)->toFormattedDateString(),
            Carbon::parse($gsm->expired_date)->toFormattedDateString(),
            Carbon::parse($gsm->active_date)->toFormattedDateString(),
            Carbon::parse($gsm->terminate_date)->toFormattedDateString(),
            $gsm->note,
            $gsm->provider,



        ];
    }
    public function headings(): array
    {
        return [
            // '#',
            'Status GSM ',
            'GSM Number ',
            'Company Name',
            'Serial Number',
            'ICC ID',
            'IMSI',
            'Res ID',
            'Request Date',
            'Expired Date',
            'Active Date',
            'Terminate Date',
            'Note',
            'Provider'






        ];
    }

    public function registerEvents(): array
    {

        return [

            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:M1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
            },



        ];
    }
}
