<?php

namespace App\Exports;

use App\Models\RequestComplaint;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class RequestComplaintExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return RequestComplaint::with('companyRequest', 'pic', 'taskRequest', 'vehicleRequest')->get();
    }
    public function map($request): array
    {
        return [
            $request->companyRequest->company_name,
            $request->internal_eksternal,
            $request->pic->pic_name,
            $request->vehicleRequest->license_plate,
            Carbon::parse($request->waktu_info)->toFormattedDateString(),
            $request->task,
            $request->platform,
            $request->detail_task,
            $request->divisi,
            Carbon::parse($request->waktu_respond)->toFormattedDateString(),
            $request->respond,
            Carbon::parse($request->waktu_kesepakatan)->toFormattedDateString(),
            Carbon::parse($request->waktu_solve)->toFormattedDateString(),
            $request->status,
            $request->status_akhir


        ];
    }

    public function headings(): array
    {
        return [
            // '#',
            'Company Name',
            'Intenal/External',
            'PIC',
            'Vehicle',
            'Waktu Info',
            'Task',
            'Platform',
            'Detail Task',
            'Divisi',
            'Waktu Respond',
            'Respond',
            'Waktu Kesepakatan',
            'Waktu Solve',
            'Status',
            'Status Akhir',

        ];
    }
    public function registerEvents(): array
    {

        return [

            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:O1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
            },


        ];
    }
}
