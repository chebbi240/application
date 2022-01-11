<?php

namespace App\Controller;
use App\Entity\Camion;
use App\Repository\CamionRepository;
// use Knp\component\Pager\PaginatorInterface;
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
    public function afficher_camion(CamionRepository $repo, Request $request){
    $camions= $repo->findAll();
      // $camions =$paginatorInterface-> paginate (
      // //   $repo->findAllWithPagination(),
      // //  $request->query->getInt('page', 1), /* numéro de page */ 
      // //  4 /* limite par page */
      // // );
        return $this->render('camion/camion.html.twig' ,[
            "camions"=>$camions,
            "admin" =>false
        ]);
        
    }
}
