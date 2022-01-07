<?php

namespace App\Controller;

use App\Entity\Chauffeur;
use App\Repository\CamionRepository;
use App\Repository\ChauffeurRepository;
#use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class chauffeurController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('chauffeur/index.html.twig');
    }
    /**
     * @Route("/chauffeurs", name="chauffeurs")
     */
    public function chauffeur(Request $request, EntityManagerInterface $manager)
    {
        $chauffeur = new Chauffeur();

        $form = $this->createFormBuilder($chauffeur)
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->getForm();
##validation
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chauffeur);
            $entityManager->flush();

            return $this->redirectToRoute('camions');
        }

        return $this->render('Chauffeur/Chauffeur.html.twig', [
            'formChauffeur' => $form->createView()
        ]);
    }
}
