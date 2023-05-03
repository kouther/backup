<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Masters;
use App\Form\MastersType;
use App\Repository\MastersRepository;
use App\Repository\CalendarRepository;

class DashboardUserController extends AbstractController
{
    #[Route('/app_dashboard_user', name: 'app_dashboard_user')]
   
    public function index(MastersRepository $mastersRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $masters = $mastersRepository->findAll();
        $masters = $paginator->paginate(
            $masters, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            6/*limit per page*/
        );
        return $this->render('user/main.html.twig', [
            'masters' => $masters,
        ]);
    }
  


    }


    


