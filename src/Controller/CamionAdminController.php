<?php

namespace App\Controller\Admin;
// use Knp\component\Pager\PaginatorInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController ;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator ;
use App\Repository\CamionRepository;
use Symfony\Component\HttpFoundation\Response ;
use Symfony\Component\Routing\Annotation\Route ;
use Symfony\Component\HttpFoundation\Request;


class CamionAdminController extends AbstractDashboardController
{
    /**
     * @Route("/camion_admin", name="camion_admin")
     */
    public function afficher_camion(CamionRepository $repo, Request $request){
        $camions= $repo->findAll();

        // $camions =$paginatorInterface-> paginate (
        //   $repo->findAllWithPagination(),
        //  $request->query->getInt('page', 1), /* numéro de page */ 
        //  4 /* limite par page */
        // );
          return $this->render('camion/camion.html.twig' ,[
              "camions"=>$camions,
              "admin" =>true
          ]);
          
          
            
              
          
   
    }
}
