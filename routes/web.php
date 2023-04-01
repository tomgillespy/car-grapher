<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ScrapeController;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::get('data/vehicle/{vehicleId}', function($vehicleId) {
    return response()->json(Vehicle::findOrFail($vehicleId));
})->name('data.vehicle');

Route::post('/start', [JobController::class, 'view'])->name('job.view');
Route::post('/scrape', [JobController::class, 'scrape'])->name('job.scrape');
Route::get('/results/{result}/export', [ScrapeController::class, 'export'])->name('results.export');
Route::get('/results/{result}/graph/{type}', [ScrapeController::class, 'graph'])->name('results.graph');
Route::resource('results', ScrapeController::class)->except(['create', 'edit', 'store', 'update', 'destroy']);


//Route::get('/layout', function() {
//    return view('pages.scrape');
//});
Route::get('/run-migrations', function () {
    return Artisan::call('migrate', ["--force" => true ]);
});
