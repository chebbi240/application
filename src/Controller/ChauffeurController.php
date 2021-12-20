<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChauffeurController extends AbstractController
{
    /**
     * @Route("/", name="chauffeur")
     */
    public function index(): Response
    {
        return $this->render('chauffeur/index.html.twig');
    }
    
}
