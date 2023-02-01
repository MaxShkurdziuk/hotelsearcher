<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hotel\CreateRequest;
use App\Http\Requests\Hotel\EditRequest;
use App\Models\Review;
use App\Models\Service;
use App\Services\HotelService;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function __construct(private HotelService $hotelService)
    {
    }

    public function addHotel()
    {
        $services = Service::all();

        return view('hotels.add', compact('services'));
    }

    public function editHotel(Hotel $hotel)
    {
        $services = Service::all();

        return view('hotels.edit', compact('hotel','services'));
    }

    public function delete(Hotel $hotel)
    {
        $hotel->delete();

        session()->flash('success', 'Hotel deleted successfully!');
        return redirect()->route('hotels.list');
    }

    public function add(CreateRequest $request)
    {
        $data = $request->validated();
        $hotel = $this->hotelService->create($data);

        session()->flash('success', 'Hotel added successfully!');
        return redirect()->route('hotels.show', ['hotel' => $hotel->id]);
    }

    public function edit(Hotel $hotel, EditRequest $request)
    {
        $data = $request->validated();
        $this->hotelService->edit($hotel, $data);

        session()->flash('success', 'Hotel edited successfully!');

        return redirect()->route('hotels.show', ['hotel' => $hotel->id]);
    }

    public function list(Request $request)
    {
        $hotels = Hotel::query()->paginate(7);

        return view('hotels.list', ['hotels' => $hotels]);
    }

    public function show(Hotel $hotel)
    {
        $reviews = Review::query()->where('hotel_id', $hotel->id)->get();

        return view('reviews.add', compact('hotel', 'reviews'));
    }
}
