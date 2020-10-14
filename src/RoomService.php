<?php
namespace App;

use App\Entity\Room;
use App\Repository\RoomModel;

/**
 * Yes, I just think it's a funny name for a service.
 */
class RoomService
{
    /** @var RoomModel */
    private $roomModel;

    public function __construct(RoomModel $roomModel)
    {
        $this->roomModel = $roomModel;
    }

    public function getRoomByID(int $roomID): ?Room
    {
        return $this->roomModel->getRoomByID($roomID);
    }
}
