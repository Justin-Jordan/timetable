<?php

namespace App\Controller;

use App\Entity\Planification;
use App\Form\PlanificationType;
use App\Repository\PlanificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/planification")
 */
class PlanificationController extends AbstractController
{
    /**
     * @Route("/", name="app_planification_index", methods={"GET"})
     */
    public function index(PlanificationRepository $planificationRepository): Response
    {
        return $this->render('planification/index.html.twig', [
            'planifications' => $planificationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_planification_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PlanificationRepository $planificationRepository): Response
    {
        $planification = new Planification();
        $form = $this->createForm(PlanificationType::class, $planification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $planificationRepository->add($planification);
            return $this->redirectToRoute('app_planification_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('planification/new.html.twig', [
            'planification' => $planification,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_planification_show", methods={"GET"})
     */
    public function show(Planification $planification): Response
    {
        return $this->render('planification/show.html.twig', [
            'planification' => $planification,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_planification_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Planification $planification, PlanificationRepository $planificationRepository): Response
    {
        $form = $this->createForm(PlanificationType::class, $planification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $planificationRepository->add($planification);
            return $this->redirectToRoute('app_planification_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('planification/edit.html.twig', [
            'planification' => $planification,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_planification_delete", methods={"POST"})
     */
    public function delete(Request $request, Planification $planification, PlanificationRepository $planificationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planification->getId(), $request->request->get('_token'))) {
            $planificationRepository->remove($planification);
        }

        return $this->redirectToRoute('app_planification_index', [], Response::HTTP_SEE_OTHER);
    }
}
