<?php

namespace App\Providers;

use App\Models\Isolate;
use App\Models\LaboratoryIsolate;
use App\Models\SiteIsolate;
use App\Observers\IsolateObserver;
use App\Observers\LaboratoryIsolateObserver;
use App\Observers\SiteIsolateObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Isolate::observe(IsolateObserver::class);
        LaboratoryIsolate::observe(LaboratoryIsolateObserver::class);
        SiteIsolate::observe(SiteIsolateObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
