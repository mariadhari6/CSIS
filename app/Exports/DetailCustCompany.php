<?php

namespace App\Exports;

use App\Models\DetailCustomer;
use App\Models\Sensor;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class DetailCustCompany implements FromCollection, WithEvents, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $details = DetailCustomer::where('company_id', $this->id)->with('company', 'gsm', 'gps', 'sensor', 'po', 'poNumber', 'vehicle', 'status')->get();

        for ($i = 0; $i <= count($details) - 1; $i++) {

            $loop_row   = $details[$i]->sensor_all;
            if ($loop_row != "") {

                $data_sensor_all = explode(" ", $loop_row);

                $temp_sensor = "";
                foreach ($data_sensor_all as $item) {
                    $cari_sensor = Sensor::where('id', $item)->get();

                    if ($temp_sensor == "") {
                        $temp_sensor = $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    } else {
                        $temp_sensor .= "; " . $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    }
                }

                $details[$i]["sensor_all_name"] = $temp_sensor;
            } else {
                $empty = "";
                $details[$i]["sensor_all_name"] = $empty;
            }
        }

        return $details;
    }

    public function map($detail_customer): array
    {
        return [
            $detail_customer->company->company_name,
            $detail_customer->vehicle->license_plate,
            $detail_customer->vehicle->vehicle->name,
            $detail_customer->po->po_number,
            $detail_customer->po->harga_layanan,
            Carbon::parse($detail_customer->po->po_date)->toFormattedDateString(),
            $detail_customer->po->status_po,
            $detail_customer->gps->imei,
            $detail_customer->gps->merk,
            $detail_customer->gps->type,
            $detail_customer->gsm->gsm_number,
            $detail_customer->gsm->provider,
            $detail_customer->sensor_all_name,
            $detail_customer->vehicle->pool_name,
            $detail_customer->vehicle->pool_location,
            Carbon::parse($detail_customer->waranty)->toFormattedDateString(),
            $detail_customer->status->service_status_name,
            Carbon::parse($detail_customer->tanggal_pasang)->toFormattedDateString(),
            Carbon::parse($detail_customer->tanggal_non_aktif)->toFormattedDateString(),
            Carbon::parse($detail_customer->tgl_reaktivasi_gps)->toFormattedDateString(),
        ];
    }

    public function headings(): array
    {
        return [
            // '#',
            'Company Name',
            'License Plate',
            'Vehicle Type',
            'Po Number',
            'Harga Layanan',
            'Po Date',
            'Status Po',
            'IMEI',
            'Merk Gps',
            'Type Gps',
            'GSM Number',
            'Provider',
            'Sensor',
            'Pool Name',
            'Pool Location',
            'Waranty',
            'Status Layanan',
            'Tanggal Pasang',
            'Tanggal Non Aktif',
            'Tanggal Reaktivasi GPS',

        ];
    }

    public function  registerEvents(): array
    {

        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:T1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
            },


        ];
    }
}
