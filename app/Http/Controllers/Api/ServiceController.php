<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ServiceController extends Controller
{
    public function list(): AnonymousResourceCollection
    {
        $services = Service::query()->latest()->paginate(3);

        return ServiceResource::collection($services);
    }
}
