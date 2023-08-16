<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventsRepository;

class StaticController extends AbstractController
{
    #[Route('/', name: 'app_static')]
    public function index(EventsRepository $eventsRepository): Response
    {
        return $this->render('static/index.html.twig', [
            'events' => $eventsRepository->findAll(),
        ]);
    }
}
