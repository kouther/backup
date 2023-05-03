<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use App\Form\EditProfileType;
use Doctrine\Persistence\ManagerRegistry;

class ProfileController extends AbstractController
{




    #[Route('/profile', name: 'profile')]
    public function editProfile(Request $request , UserPasswordHasherInterface $userPasswordHasher)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditProfileType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
       
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('message', 'Profil mis à jour');
            return $this->redirectToRoute('app_cursus');
        }

        return $this->render('profile/edit.html.twig', [
            'profileFrom' => $form->createView(),
        ]);
    }
}
