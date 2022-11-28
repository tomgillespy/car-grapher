<?php

namespace App\Exports;

use App\Models\Scrape;
use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VehicleExport implements FromCollection, WithHeadings
{
    public $vehicles;

    public function __construct($vehicles)
    {
        $this->vehicles = $vehicles;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->vehicles->map(function (Vehicle $vehicle) {
            return collect([
                'Make' => $vehicle->make_name,
                'Model' => $vehicle->model_name,
                'Headline' => $vehicle->headline,
                'Summary' => $vehicle->summary,
                'Year' => $vehicle->year,
                'Price' => $vehicle->current_price,
            ]);
        }));
    }

    public function headings(): array
    {
        return $this->collection()->first()->keys()->toArray();
    }
}
