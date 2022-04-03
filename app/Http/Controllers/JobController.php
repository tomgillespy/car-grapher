<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitURLRequest;
use App\Services\Scrapers\AutotraderService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function view(SubmitURLRequest $request)
    {
      $url = $request->url;
      $query = parse_url($request->url, PHP_URL_QUERY);
      parse_str($query, $params);
      $firstPage = file_get_contents($url);

      $scraper = new AutotraderService($firstPage);

      dd($scraper->get($params['make'], $params['model'], 0));


    }
}
