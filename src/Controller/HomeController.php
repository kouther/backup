<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Masters;
use App\Form\MastersType;
use App\Repository\MastersRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MastersRepository $mastersRepository, Request $request, PaginatorInterface $paginator): Response
{
    $masters = $mastersRepository->findAll();
    $masters = $paginator->paginate(
        $masters, /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        10/*limit per page*/
    );


    return $this->render('home/index.html.twig', [
        'masters' => $masters,
    ]);
}
   
}
