<?php

namespace App\Services\Scrapers;

use App\Contracts\ScraperContract;
use App\Models\Vehicle;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use Illuminate\Support\Collection;
use Symfony\Component\DomCrawler\Crawler;


class AutotraderService implements ScraperContract
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

    protected function getVehicleInformation($make, $model, $vehicleInfo): Vehicle
    {
      $vehicle = new Vehicle();
      $vehicle->make = VehicleMake::firstOrCreate(['make' => $make])->id;
      $vehicle->model = VehicleModel::firstOrCreate(['model' => $model])->id;
      $vehicle->service_id = $vehicleInfo->attr('data-advert-id');
      $vehicle->image_url = $vehicleInfo->filter('img.product-card-image__main-image')->attr('src');
      $vehicle->summary = $vehicleInfo->filter('p.product-card-details__subtitle')->text(null);
      $vehicle->headline = $vehicleInfo->filter('p.product-card-details__attention-grabber')->text(null);

      return $vehicle;
    }

    public function getAll(string $make, string $model): Collection
    {
        // TODO: Implement getAll() method.
    }

    public function count()
    {
        // TODO: Implement count() method.
    }

    public function get(string $make, string $model, int $index, bool $save = false): Vehicle
    {
        $list = $this->getVehiclesList();
        $vehicleInfo = $list->filter('article.product-card')->first();
        if (!$vehicleInfo) {
          throw new \Exception('Vehicle Not Found');
        }
        return $this->getVehicleInformation($make, $model, $vehicleInfo);
    }
}
