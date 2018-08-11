<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Skills;
use App\Entity\Projects;
use App\Entity\Resume;





class ApiController extends Controller
{
    /**
     * @Route("/api/skills", name="api_skills")
     */
    public function getListofSkills()
    {
    	$skills = $this->getDoctrine()->getRepository(Skills::class)->findAll();


    	$response = array();
    	foreach ($skills as $skill) {
    		$response[] = array(
    			'name' => $skill->getName(),
    			'image' => $skill->getImage(),
    			'genre' => $skill->getGenre(),
    			'path' => $this->getParameter('upload_directory').'/'.$skill->getImage()
            // other fields
    		);
    	}

    	return new JsonResponse($response);

    }

    /**
     * @Route("/api/displayprojects", name="api_displayprojects")
     */
    public function getListofDisplayProjects()
    {
    	$projects = $this->getDoctrine()->getRepository(Projects::class)->findByDisplay(true);

    	$response = array();
    	foreach ($projects as $project) {
    		$response[] = array(
    			'id' => $project->getId(),
    			'name' => $project->getName(),
    			'image' => $project->getImage(),
    			'content' => $project->getContent(),
    			'github' => $project->getGithub(),
    			'live' => $project->getLive(),
    			'techno' => $project->getTechno(),
    			'date' => $project->getDate()
            // other fields
    		);
    	}

    	return new JsonResponse($response);

    }

    /**
     * @Route("/api/projects", name="api_projects")
     */
    public function getListofProjects()
    {
    	$projects = $this->getDoctrine()->getRepository(Projects::class)->findAll();

    	$response = array();
    	foreach ($projects as $project) {
    		$response[] = array(
    			'id' => $project->getId(),
    			'name' => $project->getName(),
    			'image' => $project->getImage(),
    			'content' => $project->getContent(),
    			'github' => $project->getGithub(),
    			'live' => $project->getLive(),
    			'techno' => $project->getTechno(),
    			'date' => $project->getDate()
            // other fields
    		);
    	}

    	return new JsonResponse($response);

    }

    /**
     * @Route("/api/project/{id}", name="api_project")
     */
    public function getProject($id)
    {
    	$projects = $this->getDoctrine()->getRepository(Projects::class)->findById($id);

    	$response = array();
    	foreach ($projects as $project) {
    		$response[] = array(
    			'id' => $project->getId(),
    			'name' => $project->getName(),
    			'image' => $project->getImage(),
    			'content' => $project->getContent(),
    			'github' => $project->getGithub(),
    			'live' => $project->getLive(),
    			'techno' => $project->getTechno(),
    			'date' => $project->getDate()
            // other fields
    		);
    	}

    	return new JsonResponse($response);

    }

    /**
     * @Route("/api/resume", name="api_resume")
     */
    public function getListofResume()
    {
    	$resumes = $this->getDoctrine()->getRepository(Resume::class)->findAll();

    	$response = array();
    	foreach ($resumes as $resume) {
    		$response[] = array(
    			'title' => $resume->getTitle(),
    			'company' => $resume->getCompany(),
    			'year' => $resume->getYear(),
    			'content' => $resume->getContent(),
    			'genre' => $resume->getGenre()
            // other fields
    		);
    	}

    	return new JsonResponse($response);

    }



}
