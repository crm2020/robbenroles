<?php

namespace App\Controller;

use App\Entity\Rapporten;
use App\Form\RapportenType;
use App\Repository\RapportenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rapporten")
 */
class RapportenController extends AbstractController
{
    /**
     * @Route("/", name="rapporten_index", methods={"GET"})
     */
    public function index(RapportenRepository $rapportenRepository): Response
    {
        return $this->render('rapporten/index.html.twig', [
            'rapportens' => $rapportenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rapporten_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rapporten = new Rapporten();
        $form = $this->createForm(RapportenType::class, $rapporten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rapporten);
            $entityManager->flush();

            return $this->redirectToRoute('rapporten_index');
        }

        return $this->render('rapporten/new.html.twig', [
            'rapporten' => $rapporten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rapporten_show", methods={"GET"})
     */
    public function show(Rapporten $rapporten): Response
    {
        return $this->render('rapporten/show.html.twig', [
            'rapporten' => $rapporten,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rapporten_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Rapporten $rapporten): Response
    {
        $form = $this->createForm(RapportenType::class, $rapporten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rapporten_index');
        }

        return $this->render('rapporten/edit.html.twig', [
            'rapporten' => $rapporten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rapporten_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Rapporten $rapporten): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rapporten->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rapporten);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rapporten_index');
    }
}
