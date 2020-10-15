<?php
namespace App;

use App\Entity\Room;
use App\RoomService;

class ActionService
{
    const DEFAULT_ERROR_RESPONSE = "I'm sorry, I couldn't figure out what to do. Could you try rephrasing?";

    /** @var RoomService */
    private $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function processActionForRoom(string $action, int $roomID): string
    {
        $room = $this->roomService->getRoomByID($roomID);
        if (is_null($room)) {
            throw new \Exception('Room does not exist');
        }

        // TODO:
        // Determine action type
        // Get objects you can interact with in the room
        // Determine which object we're trying to interact with
        // Determine whether we're allowed to interact with that object
        // 1. Does the action type apply?
        // 2. Is there a prerequisite for performing this action? Have we met it?

        return self::DEFAULT_ERROR_RESPONSE;
    }
}
