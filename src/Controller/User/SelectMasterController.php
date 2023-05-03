<?php

namespace App\Controller\User;
use App\Form\SelectMasterType;

use App\Entity\SelectMaster;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UniversityRepository;

use App\Repository\MasterRepository;

class SelectMasterController extends AbstractController
{
    #[Route('/select', name: 'app_select_master')]
    public function selectMaster(Request $request, EntityManagerInterface $entityManager, UniversityRepository $universityRepository, MasterRepository $masterRepository): Response
 {  /*  $masteer = array();
     $masteer=$masterRepository->findByUniversityOrderedByAscName(2);
     dd($masteer); */
    $select = new SelectMaster();
    $form = $this->createForm(SelectMasterType::class, $select);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
 
        $entityManager->persist($select);
        $entityManager->flush();
       
        return $this->redirectToRoute('app_dashboard_user');
    }

    return $this->render('select_master/index.html.twig', [
        'form' => $form->createView(),
    ]);
}
}
