<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Projects;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProjectsController extends Controller
{
    /**
     * @Route("/projects", name="projects")
     */
    public function index()
    {
    	$repository = $this->getDoctrine()->getRepository(Projects::class);
    	$projects = $repository->findAll();
    	return $this->render('projects/index.html.twig', [
    		'projects' => $projects,
    	]);
    }
    /**
     * @Route("/add", name="addProject")
     */
    public function addProject(Request $request){

    	 // just setup a fresh $task object (remove the dummy data)
    	$project = new Projects();

    	$form = $this->createFormBuilder($project)
    	->add('name', TextType::class)
    	->add('image', TextType::class)
    	->add('content', TextType::class)
    	->add('github', TextType::class)
    	->add('live', TextType::class)
    	->add('techno', TextType::class)
    	->add('date', TextType::class)
    	->add('save', SubmitType::class, array('label' => 'Add Project'))
    	->getForm();

    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
    		$project = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
    		$entityManager = $this->getDoctrine()->getManager();
    		$entityManager->persist($project);
    		$entityManager->flush();

    		return $this->redirectToRoute('projects');
    	}

    	return $this->render('projects/add.html.twig', array(
    		'form' => $form->createView(),
    	));

    }

    /**
     * @Route("/delete/{id}", name="deleteProject")
     */
    public function deleteProject($id){

    	$repository = $this->getDoctrine()->getRepository(Projects::class);
    	$project = $repository->find($id);

    	$entityManager = $this->getDoctrine()->getManager();
    	$entityManager->remove($project);
    	$entityManager->flush();

    	return $this->redirectToRoute('projects');

    }
}
