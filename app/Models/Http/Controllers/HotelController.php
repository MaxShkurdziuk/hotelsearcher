<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hotel\CreateRequest;
use App\Http\Requests\Hotel\EditRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function addHotel()
    {
        $services = Service::all();

        return view('hotels.add', compact('services'));
    }

    public function editHotel(Hotel $hotel)
    {
        $services = Service::all();

        return view('hotels.edit', compact('services'));
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
        $hotel = new Hotel($data);

        $hotel->save();
        $hotel->services()->attach($data['services']);

        session()->flash('success', 'Hotel added successfully!');
        return redirect()->route('hotels.show', ['hotel' => $hotel->id]);
    }

    public function edit(Hotel $hotel, EditRequest $request)
    {
        $data = $request->validated();
        $hotel->fill($data);
        $hotel->services()->sync($data['services']);
        $hotel->save();

        session()->flash('success', 'Hotel edited successfully!');

        return redirect()->route('hotels.show', ['hotel' => $hotel->id]);
    }

    public function list(Request $request)
    {
        $hotels = Hotel::query()->paginate(4);

        return view('hotels.list', ['hotels' => $hotels]);
    }

    public function show(Hotel $hotel)
    {
        return view('hotels.show', compact('hotel'));
    }
}
