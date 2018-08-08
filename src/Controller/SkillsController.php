<?php

namespace App\Controller;

use App\Entity\Skills;
use App\Form\SkillsType;
use App\Repository\SkillsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/skills")
 */
class SkillsController extends Controller
{
    /**
     * @Route("/", name="skills_index", methods="GET")
     */
    public function index(SkillsRepository $skillsRepository): Response
    {
        return $this->render('skills/index.html.twig', ['skills' => $skillsRepository->findAll()]);
    }

    /**
     * @Route("/new", name="skills_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $skill = new Skills();
        $form = $this->createForm(SkillsType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $file = $skill->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $fileName);

            $skill->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($skill);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('skills/new.html.twig', [
            'skill' => $skill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="skills_edit", methods="GET|POST")
     */
    public function edit(Request $request, Skills $skill): Response
    {
        $form = $this->createForm(SkillsType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //file upload is required=false in edit so if the field is not null we process the change
            if ( $form["image"]->getData() !=  null) {

                $em = $this->getDoctrine()->getManager();

                $file = $form["image"]->getData();
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_directory'), $fileName);

                $skill->setImage($fileName);

                   //Recover previous image in order to delete it
                $uow = $em->getUnitOfWork();
                $uow->computeChangeSets();

                   // return an array of the changes made in entity
                $changeset = $uow->getEntityChangeSet($skill);
                   //var_dump($changeset); die();
                $oldImage = $changeset["image"][0];
                $path= $this->getParameter('upload_directory');

               //delete the image
                if (file_exists($path.'/'.$oldImage)) {
                   unlink($path.'/'.$oldImage);
               }
           }


           $em->persist($skill);
           $em->flush();

           return $this->redirectToRoute('admin');
       }

       return $this->render('skills/edit.html.twig', [
        'skill' => $skill,
        'form' => $form->createView(),
    ]);
   }

    /**
     * @Route("/{id}", name="skills_delete", methods="DELETE")
     */
    public function delete(Request $request, Skills $skill): Response
    {
        if ($this->isCsrfTokenValid('delete'.$skill->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();

            //delete the image from folder
            $path= $this->getParameter('upload_directory');
            if (file_exists($path.'/'.$skill->getImage())) {
               unlink($path.'/'.$skill->getImage());
           }

           $em->remove($skill);
           $em->flush();
       }

       return $this->redirectToRoute('admin');
   }
}
