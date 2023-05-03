<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MasterStateController extends AbstractController
{
    #[Route('/state', name: 'app_master_state')]
    public function index(): Response
    {
        return $this->render('master_state/index.html.twig', [
            'controller_name' => 'MasterStateController',
        ]);
    }
}
