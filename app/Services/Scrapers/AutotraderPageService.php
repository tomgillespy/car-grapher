<?php

namespace App\Services\Scrapers;

use App\Contracts\ScraperContract;
use App\Enums\FuelTypeEnum;
use App\Enums\TransmissionEnum;
use App\Models\Vehicle;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehiclePrice;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use Symfony\Component\DomCrawler\Crawler;


class AutotraderPageService implements ScraperContract
{
    protected $html;

    public function __construct(string $html)
    {
      $this->html = new Crawler($html);
    }

    private function getContentSection(): Crawler
    {
      return $this->html->filter('section#content');
    }

    private function getVehiclesList(): Crawler
    {
      $content = $this->getContentSection();
      return $content->filter('li.search-page__result');
    }

    private function processSpecs(Vehicle &$vehicle, $specArray)
    {
        foreach($specArray as $specItem) {
            $text = $specItem->textContent;
            $matches = [];
            if (preg_match('/([\d]{4}) \([\d]{2} reg\)/m', $text, $matches)) {
                $vehicle->year = $matches[1];
            } elseif (preg_match('/([\d,]*) miles/m', $text, $matches)) {
                $vehicle->mileage = str_replace(',', '', $matches[1]);
            } elseif (preg_match('/(\d{1,2}\.\d)L/', $text, $matches)) {
                $vehicle->capacity = $matches[1];
            } elseif (preg_match('/(\d{1,4})BHP/', $text, $matches)) {
                $vehicle->power = $matches[1];
            } elseif (in_array($text, FuelTypeEnum::toArray())) {
                $vehicle->fuel_type = FuelTypeEnum::$text();
            } elseif (in_array($text, TransmissionEnum::toArray())) {
                $vehicle->transmission = TransmissionEnum::$text();
            }

        }
    }

    protected function getVehicleInformation($make, $model, $vehicleInfo): Vehicle
    {
        try {
            $vehicle = new Vehicle();
            $vehicle->make_id = VehicleMake::firstOrCreate(['make' => $make])->id;
            $vehicle->model_id = VehicleModel::firstOrCreate(['model' => $model])->id;
            $vehicle->service_id = $vehicleInfo->attr('data-advert-id');
            $vehicle->image_url = $vehicleInfo->filter('img.product-card-image__main-image')->attr('src');
            $vehicle->summary = $vehicleInfo->filter('p.product-card-details__subtitle')->text('');
            $vehicle->headline = $vehicleInfo->filter('p.product-card-details__attention-grabber')->text('');

            $this->processSpecs($vehicle, $vehicleInfo->filter('.product-card-details > ul > li'));

        } catch (\Exception $e) {
            dump($e);
            dd($vehicleInfo->html());
        }

      return $vehicle;
    }

    protected function getVehiclePrice($vehicleInfo): ?float
    {
        try {
            $rawPrice = $vehicleInfo->filter('div.product-card-pricing__price > span')->text(0);
            return preg_replace('/[^\d]/', '', $rawPrice);
        } catch (InvalidArgumentException $e) {
            return null;
        }
    }

    protected function saveVehicle(Vehicle $vehicle, ?float $price): Vehicle
    {
        $existingVehicle = Vehicle::where('service_id', $vehicle->service_id)->first();
        if (!$existingVehicle) {
            $vehicle->save();
        } else {
            $existingVehicle->update([
                'headline' => $vehicle->headline,
                'image_url' => $vehicle->image_url,
                'summary' => $vehicle->summary,
            ]);
            $vehicle = $existingVehicle;
        }
        if ($price) {
            if ($vehicle->prices()->where('price', $price)->count('price') == 0) {
                VehiclePrice::create([
                    'vehicle_id' => $vehicle->id,
                    'price' => $price,
                ]);
            }
        }
        $vehicle->refresh();
        return $vehicle;
    }

    public function getAll(string $make, string $model, bool $save = false): Collection
    {
        $collection = collect();
        for($i = 0; $i < $this->count(); $i++) {
            $vehicle = $this->get($make, $model, $i, $save);
            $collection->push($vehicle);
        }
        return $collection;
    }

    public function count(): int
    {
        $content = $this->getContentSection();
        return $content->filter('li.search-page__result')->count();
    }

    public function get(string $make, string $model, int $index, bool $save = false): Vehicle
    {
        $list = $this->getVehiclesList();
        $vehicleInfo = $list->filter('article.product-card')->eq($index);
        if (!$vehicleInfo) {
          throw new \Exception('Vehicle Not Found');
        }
        $vehicle = $this->getVehicleInformation($make, $model, $vehicleInfo);
        $price = $this->getVehiclePrice($vehicleInfo);
        if ($save) {
            return $this->saveVehicle($vehicle, $price);
        }
        return $vehicle;
    }
}
