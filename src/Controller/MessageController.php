<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Message;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MessageController extends Controller
{
   	/**
     * @Route("/message", name="message")
     */
   public function index()
   {
   	$repository = $this->getDoctrine()->getRepository(Message::class);
   	$messages = $repository->findAll();
   	return $this->render('message/index.html.twig', [
   		'messages' => $messages,
   	]);
   }

    /**
     * @Route("/add", name="addMessage")
     */
    public function addMessage(Request $request){

    	 // just setup a fresh $task object (remove the dummy data)
    	$message = new Resume();

    	$form = $this->createFormBuilder($message)
    	->add('email', TextType::class)
    	->add('message', TextType::class)
    	->add('save', SubmitType::class, array('label' => 'Add Message'))
    	->getForm();

    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
    		$message = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
    		$entityManager = $this->getDoctrine()->getManager();
    		$entityManager->persist($message);
    		$entityManager->flush();

    		return $this->redirectToRoute('message');
    	}

    	return $this->render('message/add.html.twig', array(
    		'form' => $form->createView(),
    	));

    }

    /**
     * @Route("/delete/{id}", name="deleteSkill")
     */
    public function deleteMessage($id){

    	$repository = $this->getDoctrine()->getRepository(Message::class);
    	$message = $repository->find($id);

    	$entityManager = $this->getDoctrine()->getManager();
    	$entityManager->remove($message);
    	$entityManager->flush();

    	return $this->redirectToRoute('message');

    }
}
