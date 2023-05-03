<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentTabController extends AbstractController
{
    #[Route('/studenttab', name: 'app_student_tab')]
    public function index(): Response
    {
        return $this->render('student_tab/index.html.twig', [
            'controller_name' => 'StudentTabController',
        ]);
    }
    
}
