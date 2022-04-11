<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\IndexRequest as CityRequest;
use App\Http\Requests\Region\IndexRequest as RegionRequest;
use App\Services\CityService;
use App\Services\RegionService;
use function response;

class ResourceController extends Controller
{
    private $regionService;
    private $cityService;

    public function __construct(RegionService $regionService, CityService $cityService)
    {
        $this->regionService = $regionService;
        $this->cityService = $cityService;
    }

    public function regions(RegionRequest $request)
    {
        $params = $request->validated();
        return response()->successJson($this->regionService->get($params));
    }

    public function cities(CityRequest $request)
    {
        $params = $request->validated();
        return response()->successJson($this->cityService->get($params));
    }
}
