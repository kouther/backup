<?php

namespace App\Controller;

use App\Entity\Cursus;
use App\Form\Cursus1Type;
use App\Repository\CursusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cursus/crud')]
class CursusCrudController extends AbstractController
{
    #[Route('/', name: 'app_cursus_crud_index', methods: ['GET'])]
    public function index(CursusRepository $cursusRepository): Response
    {
        return $this->render('cursus_crud/index.html.twig', [
            'cursuses' => $cursusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cursus_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CursusRepository $cursusRepository): Response
    {
        $cursu = new Cursus();
        $form = $this->createForm(Cursus1Type::class, $cursu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cursusRepository->save($cursu, true);

            return $this->redirectToRoute('app_cursus_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cursus_crud/new.html.twig', [
            'cursu' => $cursu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cursus_crud_show', methods: ['GET'])]
    public function show(Cursus $cursu): Response
    {
        return $this->render('cursus_crud/show.html.twig', [
            'cursu' => $cursu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cursus_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cursus $cursu, CursusRepository $cursusRepository): Response
    {
        $form = $this->createForm(Cursus1Type::class, $cursu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cursusRepository->save($cursu, true);

            return $this->redirectToRoute('app_cursus_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cursus_crud/edit.html.twig', [
            'cursu' => $cursu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cursus_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Cursus $cursu, CursusRepository $cursusRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cursu->getId(), $request->request->get('_token'))) {
            $cursusRepository->remove($cursu, true);
        }

        return $this->redirectToRoute('app_cursus_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
