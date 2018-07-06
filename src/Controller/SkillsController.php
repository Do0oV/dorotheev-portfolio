<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Skills;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class SkillsController extends Controller
{
    /**
     * @Route("/skills", name="skills")
     */
    public function index()
    {
    	$repository = $this->getDoctrine()->getRepository(Skills::class);
    	$skills = $repository->findAll();
    	return $this->render('skills/index.html.twig', [
    		'skills' => $skills,
    	]);
    }

    /**
     * @Route("/add", name="addSkill")
     */
    public function addSkill(Request $request){

    	 // just setup a fresh $task object (remove the dummy data)
    	$skill = new Skills();

    	$form = $this->createFormBuilder($skill)
    	->add('name', TextType::class)
    	->add('image', TextType::class)
    	->add('genre', TextType::class)
    	->add('save', SubmitType::class, array('label' => 'Add Skill'))
    	->getForm();

    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
    		$skill = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
    		$entityManager = $this->getDoctrine()->getManager();
    		$entityManager->persist($skill);
    		$entityManager->flush();

    		return $this->redirectToRoute('skills');
    	}

    	return $this->render('skills/add.html.twig', array(
    		'form' => $form->createView(),
    	));

    }

    /**
     * @Route("/delete/{id}", name="deleteSkill")
     */
    public function deleteSkill($id){

    	$repository = $this->getDoctrine()->getRepository(Skills::class);
    	$skill = $repository->find($id);

    	$entityManager = $this->getDoctrine()->getManager();
    	$entityManager->remove($skill);
    	$entityManager->flush();

    	return $this->redirectToRoute('skills');

    }
    
}
