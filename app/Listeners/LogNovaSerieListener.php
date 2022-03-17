<?php

namespace App\Listeners;

use App\Events\NovaSerieEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LogNovaSerieListener
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
     * @param  NovaSerieEvent  $event
     * @return void
     */
    public function handle(NovaSerieEvent $event)
    {
        Log::info("Nova Série Cadastrada {$event->nomeSerie}");
    }
}
