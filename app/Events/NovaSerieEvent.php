<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NovaSerieEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $nomeSerie;
    public $qtdTempodadas;
    public $qtdEpisodios;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($nomeSerie,$qtdTempodadas,$qtdEpisodios)
    {
        $this->nomeSerie = $nomeSerie;
        $this->qtdTempodadas = $qtdTempodadas;
        $this->qtdEpisodios = $qtdEpisodios;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
