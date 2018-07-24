<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Skills;
use App\Entity\Projects;
use App\Entity\Resume;
use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;

class AppController extends Controller
{
    /**
     * @Route("/", name="app")
     */
    public function index()
    {
    	$skills = $this->getDoctrine()->getRepository(Skills::class);
    	$resumes = $this->getDoctrine()->getRepository(Resume::class);
    	$projects = $this->getDoctrine()->getRepository(Projects::class);

        return $this->render('app/index.html.twig', [
            'skills' => $skills->findAll(),
            'resumes' => $resumes->findAll(),
            'projects' => $projects->findByDisplay(true)
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
