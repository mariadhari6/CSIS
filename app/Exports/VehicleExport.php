<?php

namespace App\Exports;

use App\Models\Vehicle;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;



class VehicleExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Vehicle::with('vehicle', 'company')->get();
    }

    public function map($vehicle): array
    {
        return [
            $vehicle->company->company_name ?? '',
            $vehicle->license_plate,
            $vehicle->vehicle->name ?? '',
            $vehicle->pool_name,
            $vehicle->pool_location


        ];
    }

    public function headings(): array
    {
        return [
            // '#',
            'Company Name',
            'License Plate',
            'Vehicle Type',
            'Pool Name',
            'Pool Location'


        ];
    }

    public function registerEvents(): array
    {

        return [

            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:E1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
            },

        ];
    }
}
