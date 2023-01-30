<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\EmailConfirm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendVerifyMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserRegistered $event): void
    {
        Mail::to($event->user->email)->send(new EmailConfirm($event->user));
    }
}
