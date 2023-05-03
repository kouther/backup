<?php

namespace App\Controller\User;

use App\Entity\Upload;
use App\Form\UploadType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class UploadController extends AbstractController
{
    #[Route('/upload', name: 'app_upload')]

public function createUpload(Request $request, EntityManagerInterface $entityManager): Response
{
    $upload = new Upload();
    $form = $this->createForm(UploadType::class, $upload);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      
        $entityManager->persist($upload);
        $entityManager->flush();
      
        return $this->redirectToRoute('app_select_master');
    }

    return $this->render('upload/index.html.twig', [
        'UploadForm' => $form->createView(),
    ]);
}
}
