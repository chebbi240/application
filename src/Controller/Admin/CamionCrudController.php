<?php

namespace App\Controller\Admin;

use App\Entity\Camion;
use App\Repository\CamionRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CamionCrudController extends AbstractCrudController
{
    
    public static function getEntityFqcn(): string
    {
        return Camion::class;
    }
//   /**
//      * @Route("/admin", name="admin")
//      */
   
    public function afficher_camion(CamionRepository $repo, Request $request){
        $camions = $repo->findAll();
          return $this->render('camion/camion.html.twig',[
              "camions"=>$camions,
        
              "admin" => true
          ]);
          
      }

    // /**
    //  * @Route("/admin/id", name="modifCamion")
    //  */
    public function modification(Camion $camion){
       
          return $this->render('admin/modification.html.twig',[
              "camion"=>$camion]);
            


    }
    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
