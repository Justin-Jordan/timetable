<?php

namespace App\Controller;

use App\Entity\Dispense;
use App\Form\DispenseType;
use App\Repository\DispenseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dispense")
 */
class DispenseController extends AbstractController
{
    /**
     * @Route("/", name="app_dispense_index", methods={"GET"})
     */
    public function index(DispenseRepository $dispenseRepository): Response
    {
        return $this->render('dispense/index.html.twig', [
            'dispenses' => $dispenseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_dispense_new", methods={"GET", "POST"})
     */
    public function new(Request $request, DispenseRepository $dispenseRepository): Response
    {
        $dispense = new Dispense();
        $form = $this->createForm(DispenseType::class, $dispense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dispenseRepository->add($dispense);
            return $this->redirectToRoute('app_dispense_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dispense/new.html.twig', [
            'dispense' => $dispense,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_dispense_show", methods={"GET"})
     */
    public function show(Dispense $dispense): Response
    {
        return $this->render('dispense/show.html.twig', [
            'dispense' => $dispense,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_dispense_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Dispense $dispense, DispenseRepository $dispenseRepository): Response
    {
        $form = $this->createForm(DispenseType::class, $dispense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dispenseRepository->add($dispense);
            return $this->redirectToRoute('app_dispense_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dispense/edit.html.twig', [
            'dispense' => $dispense,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_dispense_delete", methods={"POST"})
     */
    public function delete(Request $request, Dispense $dispense, DispenseRepository $dispenseRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dispense->getId(), $request->request->get('_token'))) {
            $dispenseRepository->remove($dispense);
        }

        return $this->redirectToRoute('app_dispense_index', [], Response::HTTP_SEE_OTHER);
    }
}
