<?php

namespace App\Controller;
use App\Entity\Events;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventsRepository;
use Symfony\Component\HttpFoundation\Request;


#[Route('/main')]
class MainController extends AbstractController
{
    
    #[Route('/', name: 'app_main_index', methods: ['GET'])]
    public function index(EventsRepository $eventsRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'events' => $eventsRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_main_show', methods: ['GET'])]
    public function show(Events $event): Response
    {
        return $this->render('main/show.html.twig', [
            'event' => $event,
        ]);
    }

    #[Route('/type/?', name: 'app_main_index_type', methods: ['GET'])]
    public function index_type(Request $request,EventsRepository $eventsRepository): Response
    {
        $param = $request->query->get('type');
        return $this->render('main/index_filter.html.twig', [
            'events' => $eventsRepository->findByType($param),
            'filter' => ucwords($param) 
        ]);
    }

}
