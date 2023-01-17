<?php

namespace App\Http\Livewire\Scrapers;

use App\Models\Scrape;
use App\Models\Vehicle;
use App\Services\Scrapers\AutotraderPageService;
use GuzzleHttp\Client;
use Livewire\Component;

class AutotraderHtmlScraper extends Component
{
    public $initialUrl;
    public $isCancelled;
    public $isFinished;
    public $page;
    public $vehicleCount;
    public $exampleVehicle;
    public $scrape;

    protected $listeners = ['postNextPage'];

    public function render()
    {
        $params = $this->getParams([]);
        return view('livewire.scrapers.autotrader-html-scraper')->with([
            'params' => $params,
        ]);
    }

    public function cancel()
    {
        $this->isCancelled = true;
    }

    public function mount()
    {
        $this->isCancelled = false;
        $this->isFinished = false;
        $this->page = 0;
        $this->vehicleCount = 0;
        $params = $this->getParams([]);
        $this->exampleVehicle = Vehicle::getExampleVehicle($params['make'], $params['model']);
        $this->scrape = Scrape::create();
    }

    public function getNextPage()
    {
        if ($this->isFinished || $this->isCancelled) {
            return;
        }
        $this->page++;
        $params = $this->getParams([]);
        $params['page'] = $this->page;
        $url = config('car-grapher.scrapers.autotrader.url') . '?' . http_build_query($params);

        $client = new Client();
        $response = $client->request('GET', $url);
        $this->postNextPage($response->getBody());

//        $this->emit('getNextPage', $url);
    }

    public function postNextPage($response)
    {
        if ($this->isFinished || $this->isCancelled) {
            return;
        }
        $service = new AutotraderPageService($response);
        $this->vehicleCount += $service->count();
        if ($service->count() == 0) {
            $this->isFinished = true;
            return;
        }
        $params = $this->getParams([]);
        $vehicles = $service->getAll($params['make'], $params['model'], true);
        if (!$this->exampleVehicle) {
            $this->exampleVehicle = $vehicles[0];
        }
        foreach($vehicles as $vehicle) {
            if ($vehicle->id) {
                $this->scrape->vehicles()->attach($vehicle);
            }
            $this->scrape->touch();
        }
        if ($this->page >= config('car-grapher.default_crawl_pages')) {
            $this->isFinished = true;
            return redirect()->to(route('results.show', ['result' => $this->scrape]));
        }
    }

    /**
     * @param $params
     * @return mixed
     */
    public function getParams($params)
    {
        $query = parse_url($this->initialUrl, PHP_URL_QUERY);
        parse_str($query, $params);
        return $params;
    }
}
