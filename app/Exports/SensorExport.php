<?php

namespace App\Exports;

use App\Models\Sensor;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;


class SensorExport implements FromCollection, WithMapping, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Sensor::all();
    }

    public function map($sensor): array
    {
        return [
            $sensor->sensor_name,
            $sensor->merk_sensor,
            $sensor->serial_number,
            $sensor->rab_number,
            Carbon::parse($sensor->waranty)->toFormattedDateString(),
            $sensor->status


        ];
        $sensor->setAllBorders('thin');
    }

    public function headings(): array
    {
        return [
            // '#',
            'Sensor Name',
            'Merk Sensor',
            'Serial Number',
            'RAB Number',
            'Waranty',
            'Status'

        ];
    }

    public function  registerEvents(): array
    {

        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:F1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
            },


        ];
    }
}
