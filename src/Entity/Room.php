<?php

namespace App\Entity;

class Room
{
    /** @var id */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    public function getID(): int
    {
        return $this->id;
    }

    public function setID(int $id): Room
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Room
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Room
    {
        $this->description = $description;
        return $this;
    }
}
