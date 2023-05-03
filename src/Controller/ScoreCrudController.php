<?php

namespace App\Controller;

use App\Entity\Score;
use App\Form\Score1Type;
use App\Repository\ScoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/score/crud')]
class ScoreCrudController extends AbstractController
{
    #[Route('/', name: 'app_score_crud_index', methods: ['GET'])]
    public function index(ScoreRepository $scoreRepository): Response
    {
        return $this->render('score_crud/index.html.twig', [
            'scores' => $scoreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_score_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ScoreRepository $scoreRepository): Response
    {
        $score = new Score();
        $form = $this->createForm(Score1Type::class, $score);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scoreRepository->save($score, true);

            return $this->redirectToRoute('app_score_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('score_crud/new.html.twig', [
            'score' => $score,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_score_crud_show', methods: ['GET'])]
    public function show(Score $score): Response
    {
        return $this->render('score_crud/show.html.twig', [
            'score' => $score,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_score_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Score $score, ScoreRepository $scoreRepository): Response
    {
        $form = $this->createForm(Score1Type::class, $score);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scoreRepository->save($score, true);

            return $this->redirectToRoute('app_score_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('score_crud/edit.html.twig', [
            'score' => $score,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_score_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Score $score, ScoreRepository $scoreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$score->getId(), $request->request->get('_token'))) {
            $scoreRepository->remove($score, true);
        }

        return $this->redirectToRoute('app_score_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
