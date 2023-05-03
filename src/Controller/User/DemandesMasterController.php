<?php

namespace App\Controller\User;

use App\Entity\SelectMaster;
use App\Form\SelectMasterType;
use App\Repository\SelectMasterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandesMasterController extends AbstractController
{
    #[Route('/masters', name: 'app_demandes_master_index', methods: ['GET'])]
    public function index(SelectMasterRepository $selectMasterRepository): Response
    {
        return $this->render('demandes_master/index.html.twig', [
            'select_masters' => $selectMasterRepository->findAll(),
        ]);
    }



 

  
}
