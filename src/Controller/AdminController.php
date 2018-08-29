<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\MessageRepository;
use App\Repository\ProjectsRepository;
use App\Repository\ResumeRepository;
use App\Repository\SkillsRepository;
use App\Repository\AboutRepository;
use App\Entity\Skills;
use App\Entity\Projects;
use App\Entity\Resume;
use App\Entity\Message;
use App\Entity\About;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(MessageRepository $messageRepository, ProjectsRepository $projectsRepository, ResumeRepository $resumeRepository, SkillsRepository $skillsRepository, AboutRepository $aboutRepository)
    {

    	return $this->render('admin/index.html.twig', [
            'messages' => $messageRepository->findAll(),
            'projects' => $projectsRepository->findAll(),
            'resumes' => $resumeRepository->findAll(),
            'skills' => $skillsRepository->findAll(),
            'abouts' => $aboutRepository->findAll()

        ]);
    }

}
