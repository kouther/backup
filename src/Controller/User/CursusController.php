<?php

namespace App\Controller\User;

use App\Entity\Cursus;
use App\Entity\Score;
use App\Entity\User;
use App\Form\CursusFormType;
use App\Repository\CursusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;



class CursusController extends AbstractController
{

#[Route('/cursus', name: 'app_cursus')]
public function editCursus(Request $request, EntityManagerInterface $entityManager)
{
    $user = $this->getUser();
 
    $cursus= $user->getCursus();
    
    $score= new Score();
    $form = $this->createForm(CursusFormType::class, $cursus);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $Moyen= ($cursus->getBacmoyenne()+$cursus->getMoyenun()+$cursus->getMoyendeux()+$cursus->getMoyentrois()) / 4 ;
        $Malus=($cursus->getRedoublement()*2)+ $cursus->getRatrappageun()+$cursus->getRatrappagedeux()+$cursus->getRatrappagetrois();
        $Bonus= $cursus->getMentiontrois()+$cursus->getMentiondeux()+$cursus->getMentionun();
         $score->setScoreDossier(
         $Moyen+$Bonus-$Malus
         );     
         $score->setUser($user);
        $em = $this->getDoctrine()->getManager();
        $em->persist($cursus);
        $em->flush();

        $this->addFlash('message', 'Cursus mis à jour');
        $entityManager->persist($score);
        $entityManager->flush();
        return $this->redirectToRoute('app_upload');
    }

    return $this->render('cursus/index.html.twig', [
        'cursusForm' => $form->createView(),
    ]);
}
}