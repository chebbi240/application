<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController ;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator ;
use App\Repository\CamionRepository;
use Symfony\Component\HttpFoundation\Response ;
use Symfony\Component\Routing\Annotation\Route ;


class CamionAdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function afficher_camion(CamionRepository $repo ){
        $camions = $repo->findAll(); 
        
          return $this->render('camion/camion.html.twig',[
              "camions"=>$camions 
              
          ]);
          
   
    }
}
