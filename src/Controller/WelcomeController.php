<?php
namespace App\Controller;

use App\SessionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    /** @var SessionService */
    private $sessionService;

    public function __construct(SessionService $sessionService)
    {
        $this->sessionService = $sessionService;
    }

    /**
     * @Route("/happy-place", name="welcome")
     */
    public function welcome(Request $request): Response
    {
        // Reset back to the start
        $this->sessionService->clearSessionAttributes($request);

        return $this->render('welcome.html.twig', []);
    }

    /**
     * @Route("/happy-place/introduction", name="introduction")
     */
    public function introduction(Request $request): Response
    {
        $this->sessionService->setName($request);
        $name = $this->sessionService->getName($request);

        return $this->render('instructions.html.twig', [
            'name' => $name,
        ]);
    }
}
