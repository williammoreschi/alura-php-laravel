<?php

namespace App\Providers;

use App\Events\{NovaSerieEvent,SerieApagada};
use App\Listeners\{EnviarEmailNovaSerieListener, ExcluirCapaSerie, LogNovaSerieListener};
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NovaSerieEvent::class => [
            EnviarEmailNovaSerieListener::class,
            LogNovaSerieListener::class
        ],
        SerieApagada::class => [
            ExcluirCapaSerie::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
