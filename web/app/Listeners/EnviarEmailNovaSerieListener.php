<?php

namespace App\Listeners;

use App\Events\NovaSerieEvent;
use App\Services\EmailNovaSerie;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarEmailNovaSerieListener implements ShouldQueue
{
    protected $emailNovaSerie;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(EmailNovaSerie $emailNovaSerie)
    {
        $this->emailNovaSerie = $emailNovaSerie;
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerieEvent  $event
     * @return void
     */
    public function handle(NovaSerieEvent $event)
    {
        $this->emailNovaSerie->enviarEmail(
            $event->nomeSerie,
            $event->qtdTempodadas,
            $event->qtdEpisodios
        );
    }
}
