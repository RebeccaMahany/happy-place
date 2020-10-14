<?php

namespace App\Repository;

use App\Entity\Room;

class RoomModel
{
    /** @var \PDO */
    private $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getRoomByID(int $roomID): ?Room
    {
        $query = 'SELECT id, name, description FROM room WHERE id = :id;';
        $statement = $this->connection->prepare($query);
        $statement->setFetchMode(\PDO::FETCH_CLASS, Room::class);
        $statement->bindParam(':id', $roomID);
        $statement->execute();

        $room = $statement->fetch();
        if ($room === false) {
            return null;
        }

        return $room;
    }
}
