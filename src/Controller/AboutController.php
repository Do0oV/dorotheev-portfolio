<?php

namespace App\Controller;

use App\Entity\About;
use App\Form\AboutType;
use App\Repository\AboutRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/about")
 */
class AboutController extends Controller
{
    /**
     * @Route("/", name="about_index", methods="GET")
     */
    public function index(AboutRepository $aboutRepository): Response
    {
        return $this->render('about/index.html.twig', ['abouts' => $aboutRepository->findAll()]);
    }

    /**
     * @Route("/new", name="about_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $about = new About();
        $form = $this->createForm(AboutType::class, $about);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $about->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $fileName);

            $about->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($about);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('about/new.html.twig', [
            'about' => $about,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="about_show", methods="GET")
     */
    public function show(About $about): Response
    {
        return $this->render('about/show.html.twig', ['about' => $about]);
    }

    /**
     * @Route("/{id}/edit", name="about_edit", methods="GET|POST")
     */
    public function edit(Request $request, About $about): Response
    {
        $form = $this->createForm(AboutType::class, $about);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {

            //file upload is required=false in edit so if the field is not null we process the change
            if ( $form["image"]->getData() !=  null) {



                $file = $form["image"]->getData();
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_directory'), $fileName);

                $about->setImage($fileName);

                   //Recover previous image in order to delete it
                $uow = $em->getUnitOfWork();
                $uow->computeChangeSets();

                   // return an array of the changes made in entity
                $changeset = $uow->getEntityChangeSet($about);
                   //var_dump($changeset); die();
                $oldImage = $changeset["image"][0];
                $path= $this->getParameter('upload_directory');

               //delete the image
                if (file_exists($path.'/'.$oldImage)) {
                 unlink($path.'/'.$oldImage);
             }
         }

         $em->persist($about);
         $em->flush();

         return $this->redirectToRoute('about_edit', ['id' => $about->getId()]);
     }

     return $this->render('about/edit.html.twig', [
        'about' => $about,
        'form' => $form->createView(),
    ]);
 }

    /**
     * @Route("/{id}", name="about_delete", methods="DELETE")
     */
    public function delete(Request $request, About $about): Response
    {
        if ($this->isCsrfTokenValid('delete'.$about->getId(), $request->request->get('_token'))) {

            $em = $this->getDoctrine()->getManager();

            //delete the image from folder
            $path= $this->getParameter('upload_directory');
            if (file_exists($path.'/'.$about->getImage())) {
               unlink($path.'/'.$about->getImage());
           }

           $em->remove($about);
           $em->flush();
       }

        return $this->redirectToRoute('admin');
    }
}
