<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Hotel;
use App\Models\User;

class HotelService
{
    public function create(array $data): Hotel
    {
        $hotel = new Hotel($data);
        $hotel->save();
        $hotel->services()->attach($data['services']);

        return $hotel;
    }

    public function edit(Hotel $hotel, array $data): void
    {
        $hotel->fill($data);
        $hotel->services()->sync($data['services']);
        $hotel->save();
    }

    public function delete(Hotel $hotel): void
    {
        $hotel->delete();
    }
}
