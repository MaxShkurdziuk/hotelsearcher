<?php

namespace App\Observers;

use App\Jobs\UpdatedHotelNameEmail;
use App\Mail\UpdatedName;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class HotelObserver
{
    /**
     * Handle the Hotel "updated" event.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return void
     */
    public function updated(Hotel $hotel)
    {
        $isNameChanged = $hotel->name !== $hotel->getOriginal('name');

        if ($isNameChanged) {
            UpdatedHotelNameEmail::dispatch($hotel);
        }
    }
}
