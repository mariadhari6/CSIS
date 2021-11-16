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

class MaintenanceExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return RequestComplaint::with('companyRequest', 'taskRequest', 'teknisiMaintenance', 'gpsMaintenance', 'detailCustomerVehicleRequest', 'gsm')->whereIn('task', [4, 5])->get();
    }

    public function map($maintenance): array
    {
        return [
            $maintenance->companyRequest->company_name,
            $maintenance->taskRequest->task,
            $maintenance->detailCustomerVehicleRequest->vehicle->license_plate ?? '',
            Carbon::parse($maintenance->waktu_kesepakatan)->toFormattedDateString(),
            $maintenance->gpsMaintenance->type ?? '',
            $maintenance->equipment_gps_id,
            $maintenance->equipment_sensor_id,
            $maintenance->gsm->gsm_number ?? '',
            $maintenance->ketersediaan_kendaraan,
            $maintenance->keterangan,
            $maintenance->hasil,
            $maintenance->biaya_transportasi,
            $maintenance->teknisiMaintenance->teknisi_name ?? '',
            $maintenance->req_by,
            $maintenance->note_maintenance,
            $maintenance->status,

        ];
    }
    public function headings(): array
    {
        return [
            // '#',
            'Company Name',
            'Permasalahan',
            'Vehicle',
            'Tanggal',
            'Type GPS',
            'GPS Terpakai',
            'Sensor Terpakai',
            'GSM',
            'Ketersediaan Kendaraan',
            'Keterangan',
            'Hasil',
            'Biaya Transportasi',
            'Teknisi',
            'Req By',
            'Note',
            'Status'
        ];
    }

    public function registerEvents(): array
    {

        return [

            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:P1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
            },
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
