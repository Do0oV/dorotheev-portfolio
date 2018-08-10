<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\MessageType;
use App\Entity\Skills;
use App\Entity\Projects;
use App\Entity\Resume;
use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Finder\Finder;

class AppController extends Controller
{
    /**
     * @Route("/", name="app")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {   

        $message = new Message();
        $skills = $this->getDoctrine()->getRepository(Skills::class);
        $resumes = $this->getDoctrine()->getRepository(Resume::class);
        $projects = $this->getDoctrine()->getRepository(Projects::class);

        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message->setIp($request->getClientIp());
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            // save to db
            $em->flush();
            $now = new \DateTime();

            $mail = (new \Swift_Message('Hello Email'))
            ->setFrom('send@example.com')
            ->setTo('dorothee.v@codeur.online')
            ->setBody(
                $this->renderView(
                        // templates/emails/registration.html.twig
                    'emails/registration.html.twig',[
                        'message' => $message
                    ]
                ),
                'text/html'
            )
            
                 //If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'emails/registration.html.twig',[
                        'message' => $message
                    ]
                ),
                'text/html'
            );

            // send the mail 
            $mailer->send($mail);

            $this->addFlash('success', 'Your message has been sent');

            

            return $this->redirectToRoute('app', ['_fragment' => 'contact']);
        }

        return $this->render('app/index.html.twig', [
            'skills' => $skills->findAll(),
            'resumes' => $resumes->findAll(),
            'projects' => $projects->findByDisplay(true),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("projects/", name="projects")
     */
    public function list()
    {
    	
    	$projects = $this->getDoctrine()->getRepository(Projects::class);
    	
        return $this->render('app/projects-list.html.twig', [
            'projects' => $projects->findAll()
        ]);
    }

    /**
     * @Route("project/{id}", name="show-project")
     */
    public function show($id)
    {
    	
    	$projects = $this->getDoctrine()->getRepository(Projects::class);

        return $this->render('app/project.html.twig', [
            'projects' => $projects->find($id)
            
        ]);
    }


}
