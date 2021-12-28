<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CamionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class camionController extends AbstractController
{
   /**
     * @Route("/camions", name="camions")
     */
    public function afficher_camion(CamionRepository $repo): Response
    {
       
        return $this->render('chauffeur/camions.html.twig');
        
    }
}
