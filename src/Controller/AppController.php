<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\MessageType;
use App\Entity\Skills;
use App\Entity\About;
use App\Entity\Projects;
use App\Entity\Resume;
use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Finder\Finder;
use ReCaptcha\ReCaptcha;

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
        $about = $this->getDoctrine()->getRepository(About::class);
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
        
        
        $recaptcha = new ReCaptcha('6Lc0xm0UAAAAAAenwJ5YD-CoYBgviYz5gT8idFvp');
        $resp = $recaptcha->verify($request->request->get('g-recaptcha-response'), $request->getClientIp());

        if ($form->isSubmitted() && $form->isValid() && !$resp->isSuccess()){
            
            $this->addFlash('danger', 'Ooops looks like you are a Robot');
        }


        if ($form->isSubmitted() && $form->isValid() && $resp->isSuccess()) {



            //var_dump($resp);die();
            $message->setIp($request->getClientIp());
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            // save to db
            $em->flush();
            $now = new \DateTime();
            $mail = (new \Swift_Message('New contact message'))
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
                'text/plain'
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
            'more_projects' => $projects->findByDisplay(false),
            'abouts' => $about->findAll(),
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
