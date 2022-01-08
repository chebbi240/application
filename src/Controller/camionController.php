<?php

namespace App\Controller;
use App\Entity\Camion;
use App\Repository\CamionRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class camionController extends AbstractController
{
   /**
     * @Route("/camions", name="camions")
     */
    public function afficher_camion(CamionRepository $repo){
      $camions = $repo->findAll();
        return $this->render('camion/camion.html.twig',[
            "camions"=>$camions
       
        ]);
        
    }
}
