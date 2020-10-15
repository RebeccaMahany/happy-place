<?php
namespace App\Controller;

use App\ActionService;
use App\RoomService;
use App\SessionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{
    /** @var ActionService */
    private $actionService;

    /** @var RoomService */
    private $roomService;

    /** @var SessionService */
    private $sessionService;

    public function __construct(ActionService $actionService, RoomService $roomService, SessionService $sessionService)
    {
        $this->actionService = $actionService;
        $this->roomService = $roomService;
        $this->sessionService = $sessionService;
    }

    /**
     * @Route("/happy-place/explore", name="explore")
     */
    public function viewRoom(Request $request): Response
    {
        $currentRoomID = $this->sessionService->getCurrentRoomID($request);
        $room = $this->roomService->getRoomByID((int)$currentRoomID);

        if (is_null($room)) {
            return $this->redirectToRoute('error');
        }

        return $this->render('room.html.twig', [
            'name' => $this->sessionService->getName($request),
            'roomName' => $room->getName(),
            'roomDescription' => $room->getDescription()
        ]);
    }

    /**
     * @Route("/happy-place/ajax/room-action", name="room-action")
     */
    public function roomAction(Request $request): JsonResponse
    {
        $userAction = $request->request->get('action');
        $currentRoomID = $this->sessionService->getCurrentRoomID($request);
        $actionResult = $this->actionService->processActionForRoom($userAction, $currentRoomID);

        return new JsonResponse(['action_result' => $actionResult]);
    }
}
