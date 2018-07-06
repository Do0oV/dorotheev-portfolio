<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Resume;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ResumeController extends Controller
{
        /**
     * @Route("/resume", name="resume")
     */
    public function index()
    {
    	$repository = $this->getDoctrine()->getRepository(Resume::class);
    	$resumes = $repository->findAll();
    	return $this->render('resume/index.html.twig', [
    		'resumes' => $resumes,
    	]);
    }

    /**
     * @Route("/add", name="addResume")
     */
    public function addResume(Request $request){

    	 // just setup a fresh $task object (remove the dummy data)
    	$resume = new Resume();

    	$form = $this->createFormBuilder($resume)
    	->add('title', TextType::class)
    	->add('company', TextType::class)
    	->add('year', TextType::class)
    	->add('content', TextType::class)
    	->add('genre', TextType::class)
    	->add('save', SubmitType::class, array('label' => 'Add Resume'))
    	->getForm();

    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
    		$resume = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
    		$entityManager = $this->getDoctrine()->getManager();
    		$entityManager->persist($resume);
    		$entityManager->flush();

    		return $this->redirectToRoute('resume');
    	}

    	return $this->render('resume/add.html.twig', array(
    		'form' => $form->createView(),
    	));

    }

    /**
     * @Route("/delete/{id}", name="deleteSkill")
     */
    public function deleteResume($id){

    	$repository = $this->getDoctrine()->getRepository(Resume::class);
    	$resume = $repository->find($id);

    	$entityManager = $this->getDoctrine()->getManager();
    	$entityManager->remove($resume);
    	$entityManager->flush();

    	return $this->redirectToRoute('resume');

    }
}
