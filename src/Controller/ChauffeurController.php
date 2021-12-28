<?php

namespace App\Controller;

use App\Repository\CamionRepository;
use App\Repository\ChauffeurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class chauffeurController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('chauffeur/index.html.twig');
    }
     /**
     * @Route("/chauffeurs", name="chauffeurs")
     */
    public function chauffeur( ) :Response
    { 
        
        return $this->render('Chauffeur/Chauffeur.html.twig');
        
    }
   
}
   
    

