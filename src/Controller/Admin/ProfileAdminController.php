<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UpdatePRofileType;
use App\Form\User1Type;

class ProfileAdminController extends AbstractController
{
    #[Route('/profileAdmin', name: 'app_profile_admin')]
    public function index(Request $request)
    {
        $user = $this->getUser();
        $admin=$user->getAdmin();
        $form = $this->createForm(UpdatePRofileType::class, $admin);
        $form->handleRequest($request);


        $form2 = $this->createForm(User1Type::class, $user);
        $form2->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('app_all_user_index', [], Response::HTTP_SEE_OTHER);
        }


        return $this->render('profile_admin/index.html.twig', [
            'ProfileForm' => $form->createView(),
            'ProfileForm2' => $form2->createView(),
        ]);
    }
}
