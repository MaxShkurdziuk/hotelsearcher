<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CreateRequest;
use App\Http\Requests\Article\EditRequest;
use App\Http\Resources\HotelResource;
use App\Models\Hotel;
use App\Services\HotelService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class HotelController extends Controller
{
    public function __construct(private HotelService $hotelService)
    {
    }

    public function create(CreateRequest $request): HotelResource
    {
        $data = $request->validated();
        $user = $request->user();
        $hotel = $this->hotelService->create($data, $user);

        return new HotelResource($hotel);
    }

    public function edit(Hotel $hotel, EditRequest $request): HotelResource
    {
        $data = $request->validated();
        $this->hotelService->edit($hotel, $data);

        return new HotelResource($hotel);
    }

    public function list(): AnonymousResourceCollection
    {
        $hotels = Hotel::query()->with(['user', 'services'])->latest()->paginate(5);

        return HotelResource::collection($hotels);
    }

    public function show(Hotel $hotel): HotelResource
    {
        return new HotelResource($hotel);
    }

    public function delete(Hotel $hotel): Response
    {
        $this->hotelService->delete($hotel);
        $data = [
            'message' => 'Hotel successfully deleted',
        ];

        return response($data, status: 200);
    }
}
