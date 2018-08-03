<?php

namespace App\Controller;

use App\Entity\Resume;
use App\Form\ResumeType;
use App\Repository\ResumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/resume")
 */
class ResumeController extends Controller
{
    /**
     * @Route("/", name="resume_index", methods="GET")
     */
    public function index(ResumeRepository $resumeRepository): Response
    {
        return $this->render('resume/index.html.twig', ['resumes' => $resumeRepository->findAll()]);
    }

    /**
     * @Route("/new", name="resume_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $resume = new Resume();
        $form = $this->createForm(ResumeType::class, $resume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resume);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('resume/new.html.twig', [
            'resume' => $resume,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="resume_edit", methods="GET|POST")
     */
    public function edit(Request $request, Resume $resume): Response
    {
        $form = $this->createForm(ResumeType::class, $resume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('resume/edit.html.twig', [
            'resume' => $resume,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="resume_delete", methods="DELETE")
     */
    public function delete(Request $request, Resume $resume): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resume->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resume);
            $em->flush();
        }

        return $this->redirectToRoute('admin');
    }
}
