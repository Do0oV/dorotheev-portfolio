<?php

namespace App\Controller;

use App\Entity\Projects;
use App\Form\ProjectsType;
use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/projects")
 */
class ProjectsController extends Controller 
{
    /**
     * @Route("/", name="projects_index", methods="GET")
     */
    public function index(ProjectsRepository $projectsRepository): Response
    {
        return $this->render('projects/index.html.twig', ['projects' => $projectsRepository->findAll()]);
    }

    /**
     * @Route("/new", name="projects_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $project = new Projects();
        $form = $this->createForm(ProjectsType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $file = $project->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $fileName);

            $project->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('projects/new.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="projects_edit", methods="GET|POST")
     */
    public function edit(Request $request, Projects $project): Response
    {
        $form = $this->createForm(ProjectsType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //file upload is required=false in edit so if the field is not null we process the change
            if ( $form["image"]->getData() !=  null) {


                $file = $form["image"]->getData();
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_directory'), $fileName);

                $project->setImage($fileName);

                //Recover previous image in order to delete it
                $uow = $em->getUnitOfWork();
                $uow->computeChangeSets();

                   // return an array of the changes made in entity
                $changeset = $uow->getEntityChangeSet($project);
                   //var_dump($changeset); die();
                $oldImage = $changeset["image"][0];
                $path= $this->getParameter('upload_directory');

               //delete the image
                if (file_exists($path.'/'.$oldImage)) {
                 unlink($path.'/'.$oldImage);
             }
         }

         $this->getDoctrine()->getManager()->flush();

         return $this->redirectToRoute('admin');
     }

     return $this->render('projects/edit.html.twig', [
        'project' => $project,
        'form' => $form->createView(),
    ]);
 }

    /**
     * @Route("/{id}", name="projects_delete", methods="DELETE")
     */
    public function delete(Request $request, Projects $project): Response
    {
        if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();

            //delete the image from folder
            $path= $this->getParameter('upload_directory');
            if (file_exists($path.'/'.$project->getImage())) {
                unlink($path.'/'.$project->getImage());
         }

         $em->remove($project);
         $em->flush();
     }

     return $this->redirectToRoute('admin');
 }
}
