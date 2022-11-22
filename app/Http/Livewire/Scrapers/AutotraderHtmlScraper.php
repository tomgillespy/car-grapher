<?php

namespace App\Http\Livewire\Scrapers;

use App\Models\Vehicle;
use Livewire\Component;

class AutotraderHtmlScraper extends Component
{
    public $initialUrl;
    public $isCancelled;
    public $page;
    public $vehicleCount;

    protected $listeners = ['postNextPage'];

    public function render()
    {
        $query = parse_url($this->initialUrl, PHP_URL_QUERY);
        parse_str($query, $params);

        $exampleVehicle = Vehicle::getExampleVehicle($params['make'], $params['model']);

        return view('livewire.scrapers.autotrader-html-scraper')->with([
            'params' => $params,
            'exampleVehicle' => $exampleVehicle,
        ]);
    }

    public function cancel()
    {
        $this->isCancelled = true;
    }

    public function mount()
    {
        $this->isCancelled = false;
        $this->page = 0;
        $this->vehicleCount = 0;
    }

    public function getNextPage()
    {
        $this->page++;
        $query = parse_url($this->initialUrl, PHP_URL_QUERY);
        parse_str($query, $params);
        $params['page'] = $this->page;
        $url = 'https://www.autotrader.co.uk/car-search?' . http_build_query($params);
        $this->emit('getNextPage', $url);
    }

    public function postNextPage($response)
    {

    }
}
