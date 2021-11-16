<?php

namespace App\Exports;

use App\Models\RequestComplaint;
use App\Models\Sensor;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class PemasanganMutasiGpsExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $pemasangan_mutasi_GPS = RequestComplaint::with('detailCustomerImei', 'taskRequest', 'teknisi', 'detailCustomerGsm', 'detailCustomerGps', 'detailCustomerVehicle', 'vehicleKendaraanPasang')->whereIn('task', [1, 2, 3])->get();
        for ($i = 0; $i <= count($pemasangan_mutasi_GPS) - 1; $i++) {

            $loop_row   = $pemasangan_mutasi_GPS[$i]->equipment_terpakai_sensor;
            if ($loop_row != "") {

                $data_equipment_terpakai_sensor = explode(" ", $loop_row);

                $temp_sensor = "";
                foreach ($data_equipment_terpakai_sensor as $item) {
                    $cari_sensor = Sensor::where('id', $item)->get();

                    if ($temp_sensor == "") {
                        $temp_sensor = $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    } else {
                        $temp_sensor .= "; " . $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    }
                }

                $pemasangan_mutasi_GPS[$i]["equipment_terpakai_sensor_all_name"] = $temp_sensor;
            } else {
                $empty = "";
                $pemasangan_mutasi_GPS[$i]["equipment_terpakai_sensor_all_name"] = $empty;
            }
        }
        return $pemasangan_mutasi_GPS;
    }

    public function map($pemasangan): array
    {
        return [
            $pemasangan->companyRequest->company_name,
            $pemasangan->taskRequest->task,
            Carbon::parse($pemasangan->waktu_kesepakatan)->toFormattedDateString(),
            $pemasangan->detailCustomerVehicle->vehicle->license_plate,
            $pemasangan->vehicleKendaraanPasang->license_plate ?? '',
            $pemasangan->detailCustomerImei->imei ?? '',
            $pemasangan->detailCustomerGsm->gsm_number ?? '',
            $pemasangan->detailCustomerGps->type ?? '',
            $pemasangan->equipment_terpakai_sensor_all_name,
            $pemasangan->teknisi->teknisi_name ?? '',
            $pemasangan->uang_transportasi,
            $pemasangan->type_visit,
            $pemasangan->note_pemasangan,
            $pemasangan->status,

        ];
    }

    public function headings(): array
    {
        return [
            // '#',
            'Company Name',
            'Jenis Pekerjaan',
            'Tanggal',
            'Kendaraan Awal',
            'Kendaraan Pasang',
            'IMEI',
            'GSM',
            'GPS',
            'Sensor',
            'Teknisi',
            'Uang Transportasi',
            'Type Visit',
            'Note',
            'Status'




        ];
    }

    public function registerEvents(): array
    {

        return [

            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:N1'; // All headers
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
