<?php

namespace App\Controller;

use App\Entity\Suspect;
use App\Form\SuspectType;
use App\Repository\SuspectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/suspect")
 */
class SuspectController extends AbstractController
{
    /**
     * @Route("/", name="suspect_index", methods={"GET"})
     */
    public function index(SuspectRepository $suspectRepository): Response
    {
        return $this->render('suspect/index.html.twig', [
            'suspects' => $suspectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="suspect_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $suspect = new Suspect();
        $form = $this->createForm(SuspectType::class, $suspect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($suspect);
            $entityManager->flush();

            return $this->redirectToRoute('suspect_index');
        }

        return $this->render('suspect/new.html.twig', [
            'suspect' => $suspect,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="suspect_show", methods={"GET"})
     */
    public function show(Suspect $suspect): Response
    {
        return $this->render('suspect/show.html.twig', [
            'suspect' => $suspect,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="suspect_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Suspect $suspect): Response
    {
        $form = $this->createForm(SuspectType::class, $suspect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('suspect_index');
        }

        return $this->render('suspect/edit.html.twig', [
            'suspect' => $suspect,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="suspect_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Suspect $suspect): Response
    {
        if ($this->isCsrfTokenValid('delete'.$suspect->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($suspect);
            $entityManager->flush();
        }

        return $this->redirectToRoute('suspect_index');
    }
}
