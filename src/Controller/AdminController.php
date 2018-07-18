<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Skills;
use App\Entity\Projects;
use App\Entity\Resume;
use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {

    	$entities = ['Messages', 'Projects', 'Resume', 'Skills'];

    	return $this->render('admin/base-admin.html.twig', [
    		'controller_name' => 'AdminController',
    		'entities' => $entities
    	]);
    }

}
