<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Compiler\ResolveBindingsPass;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\Form\Forms;

class LearningController extends AbstractController
{

    private string $name;

    /**
     * LearningController constructor.
     * @param string $name
     */
    public function __construct()
    {
        $this->name = "Unknown";
    }

    /**
     * @Route("/learning", name="learn")
     */
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }


    /**
     * @Route("/layer", name="lay")
     */
    public function learning(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }

    /**
     * @Route("/about-me", name="aboutMe")
     */
    public function aboutMe(): Response
    {

        return $this->render('learning/aboutMe.html.twig', ['name' => 'BeCode']);
    }

/*
showMyName: On this page you will greet the user by his name. The default name is "Unknown".
Below the greeting there should be a form where the user can save his name.
When submitted (POST) this should send the user to the changeMyName page.
This page should be the homepage. If you just enter the domain name this should be the page that opens up.
*/


    /**
     * @Route("/", name="showName")
     */
    public function showMyName(): Response
    {
        session_start();
        if(isset($_SESSION["name"] )){

            $this->name=$_SESSION["name"];

        }

        return $this->render('learning/showName.html.twig', [
            'name' => $this ->name,
        ]);
    }

    /**
     * @Route("/change-name", name="changeName")
     */
    public function changeMyName(): Response
    {

        $_SESSION["name"]=$_POST["name"];
        return $this->redirectToRoute('showName');

    }

}

