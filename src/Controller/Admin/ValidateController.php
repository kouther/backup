<?php

namespace App\Controller\Admin;

use App\Entity\Validation;
use App\Form\ValidateFormType;
use App\Repository\ValidationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/score')]

class ValidateController extends AbstractController
{
    #[Route('{id}', name: 'app_validate', methods: ['GET', 'POST'])]
    public function valid(Request $request,  ValidationRepository $validationRepository, Validation $validation): Response
    {
        $form = $this->createForm(ValidateFormType::class, $validation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $validationRepository->save($validation, true);

            return $this->redirectToRoute('app_all_user_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('validate/index.html.twig', [
            'ValidateForm' => $form,
        ]);
    }
}
