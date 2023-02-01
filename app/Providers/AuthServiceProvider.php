<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Hotel;
use App\Models\Review;
use App\Models\Service;
use App\Policies\HotelPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\ServicePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Hotel::class => HotelPolicy::class,
        Service::class => ServicePolicy::class,
        Review::class => ReviewPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
