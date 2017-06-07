<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RoomJoined implements ShouldBroadcast
{
    public $room = null;
    public $user = null;

    public function __construct($room, $user)
    {
        $this->room = $room;
        $this->user = $user;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('room.'.$this->room->id);
    }
}