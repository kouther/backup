<?php

namespace App\Controller\Admin;

use App\Entity\Upload;
use App\Entity\User;
use App\Entity\Score;
use App\Form\ScoreType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ScoreRepository;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



#[Route('/Students')]
class AllUserController extends AbstractController
{
    #[Route('', name: 'app_all_user_index', methods: ['GET'])]
    
    public function index(UserRepository $userRepository): Response

    {
        return $this->render('all_user/index.html.twig', [
            'data' => $userRepository->findAll(),

        ]);
    }
   #[Route('{id}', name: 'app_all_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        $cursu=$user->getCursus() ;
        $upload=$user->getUpload();
        $select=$user->getSelectMaster();
        
        return $this->render('all_user/show.html.twig', [
            'user' => $user,
            'cursus' => $cursu,
            'upload' => $upload,
            'select' => $select,
            
        ]);
    } 
   
 
 


    
}
