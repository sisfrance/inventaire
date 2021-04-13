<?php

namespace App\Controller;

use App\Entity\Courrier;
use App\Form\CourrierType;
use App\Repository\CourrierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/courrier")
 */
class CourrierController extends AbstractController
{
    /**
     * @Route("/", name="courrier_index", methods={"GET"})
     */
    public function index(CourrierRepository $courrierRepository): Response
    {
        return $this->render('courrier/index.html.twig', [
            'courriers' => $courrierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="courrier_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $courrier = new Courrier();
        $form = $this->createForm(CourrierType::class, $courrier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($courrier);
            $entityManager->flush();

            return $this->redirectToRoute('courrier_index');
        }

        return $this->render('courrier/new.html.twig', [
            'courrier' => $courrier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="courrier_show", methods={"GET"})
     */
    public function show(Courrier $courrier): Response
    {
        return $this->render('courrier/show.html.twig', [
            'courrier' => $courrier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="courrier_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Courrier $courrier): Response
    {
        $form = $this->createForm(CourrierType::class, $courrier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('courrier_index');
        }

        return $this->render('courrier/edit.html.twig', [
            'courrier' => $courrier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="courrier_delete", methods={"POST"})
     */
    public function delete(Request $request, Courrier $courrier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$courrier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($courrier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('courrier_index');
    }
}
