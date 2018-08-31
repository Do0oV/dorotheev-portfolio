<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
    public function index(Request $request)
    {

        $skill = $this->getDoctrine()->getRepository(Skills::class);
        $resume = $this->getDoctrine()->getRepository(Resume::class);
        $project = $this->getDoctrine()->getRepository(Projects::class);
        $about = $this->getDoctrine()->getRepository(About::class);
        $message = $this->getDoctrine()->getRepository(Message::class);

        return $this->render('admin/index.html.twig', [
            'messages' => $message->findAll(),
            'projects' => $project->findAll(),
            'resumes' => $resume->findAll(),
            'skills' => $skill->findAll(),
            'abouts' => $about->findAll()

        ]);
    }

}
