<?php

namespace App\Controller\Admin;
use App\Entity\Score;
use App\Form\ScoreType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ScoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/score')]

class ScoreController extends AbstractController
{
 
    #[Route('{id}', name: 'app_score_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Score $score, ScoreRepository $scoreRepository): Response
    {
        $form = $this->createForm(ScoreType::class, $score);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scoreRepository->save($score, true);

            return $this->redirectToRoute('app_all_user_index', [], Response::HTTP_SEE_OTHER);
        }

       
        return $this->renderForm('score/index.html.twig', [
            'score' => $score,
            'ScoreForm' => $form,
           
        ]);
    }
}
