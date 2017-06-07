<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewRoomAdded implements ShouldBroadcast
{
    public $model = null;

    public function __construct($model = null)
    {
        $this->model = $model;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('rooms-list');
    }
}