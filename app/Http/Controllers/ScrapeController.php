<?php

namespace App\Http\Controllers;

use App\Exports\VehicleExport;
use App\Models\Scrape;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ScrapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Scrape $scrape
     * @return Application|Factory|View
     */
    public function show(Scrape $result)
    {
        return view('pages.results.show')->with([
            'result' => $result,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Scrape $scrape
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scrape $scrape)
    {
        //
    }

    public function export(Scrape $result)
    {
        $vehicleId = $result->vehicles->first()->make_name.'_'.$result->vehicles->first()->model_name.date('Y-m-d');
        return Excel::download(new VehicleExport($result->vehicles), "vehicles_$vehicleId.xlsx");
    }

    public function graph(Scrape $result, $type)
    {
        $chartData = [];
        foreach($result->vehicles as $vehicle) {
            $chartData[] = [
                'x' => $vehicle->mileage == 0 ? 1 : $vehicle->mileage,
                'y' => $vehicle->current_price,
                'vehicle' => $vehicle->toArray(),
            ];
        }

        return view('pages.graph.mileage_vs_price')->with([
            'result' => $result,
            'type' => $type,
            'data' => [
                'datasets' => [
                    [
                        'label' => 'Mileage vs Price',
                        'data' => $chartData,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    ]
                ],
            ],
        ]);
    }
}
