<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitURLRequest;
use App\Services\Scrapers\AutotraderPageService;

class JobController extends Controller
{
    public function view(SubmitURLRequest $request)
    {
      $url = $request->url;
      $query = parse_url($request->url, PHP_URL_QUERY);
      parse_str($query, $params);
      $firstPage = file_get_contents($url);

      $scraper = new AutotraderPageService($firstPage);

      $vehicle = $scraper->get($params['make'], $params['model'], 1, true);

      return view('pages.view')->with([
        'vehicle' => $vehicle,
      ]);
    }
}
