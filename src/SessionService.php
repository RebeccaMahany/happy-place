<?php
namespace App;

use Symfony\Component\HttpFoundation\Request;

class SessionService
{
    const NAME_ATTRIBUTE = 'name';
    const ROOM_ID_ATTRIBUTE = 'room-id';

    const DEFAULT_NAME = 'friend';
    const DEFAULT_ROOM_ID = 1;

    public function getName(Request $request): string
    {
        $session = $request->getSession();
        return $session->get(self::NAME_ATTRIBUTE, self::DEFAULT_NAME);
    }

    public function setName(Request $request)
    {
        $newName = $request->request->get('name');
        $session = $request->getSession();

        if ($newName) {
            $session->set('name', $newName);
            $name = $newName;
        } else {
            $currentName = $session->get('name');
            if ($currentName) {
                $name = $currentName;
            } else {
                $name = self::DEFAULT_NAME;
                $session->set('name', $name);
            }
        }

        $session->set(self::NAME_ATTRIBUTE, $name);
    }

    public function getCurrentRoomID(Request $request): int
    {
        $session = $request->getSession();
        return $session->get(self::ROOM_ID_ATTRIBUTE, self::DEFAULT_ROOM_ID);
    }

    public function setCurrentRoomID(Request $request, int $roomID)
    {
        $session = $request->getSession();
        $session->set(self::ROOM_ID_ATTRIBUTE, $roomID);
    }

    public function clearSessionAttributes(Request $request)
    {
        $session = $request->getSession();
        $session->remove(self::NAME_ATTRIBUTE);
        $session->remove(self::ROOM_ID_ATTRIBUTE);
    }
}
