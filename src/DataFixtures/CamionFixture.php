<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Camion;
use App\Entity\Chauffeur;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Reservation;
use App\Entity\Tour;
use App\DateTimeInterface;
use App\DataFixtures\Faker\Factory;

class CamionFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
     $modele1 = new Modele();
     $modele1 ->setModele_Libelle("Trafic");
     $manager->persist($modele1);

     $modele2 = new Modele();
     $modele2 ->setModele_Libelle("Expert");
     $manager->persist($modele2);

     $modele3 = new Modele();
     $modele3 ->setModele_Libelle("Expert");
     $manager->persist($modele3);

      $m1 = new Marque();
      $m1->setMarque_Libelle("Peugeot")
         ->setModele($modele2);
      $manager->persist($m1);

      $m2 = new Marque();
      $m2 ->setMarque_Libelle("Renault")
          ->setModele($modele1);
      $manager->persist($m2);
      //generer de maniere aléatoire l'ensemble de nos camions
      $modeles=[$modele1,$modele2,$modele3];

      $faker = \Faker\Factory::create ('fr_FR');
      foreach ($modeles as $m ) {
         $rand= rand(3,5);
        for($i=1 ;$i<=$rand;$i++){
           $c = new Camion();
         //Xx1232xx
          $c->setMatricule($faker->regexify("[A-Z]{2}-[0-9]{3,4}-[A-Z]{2}"))
            ->setKilometrage($faker->randomElement($array= array(3,5)))
            ->setMarque($m1);
          $manager->persist($c);
      }
      }
       $ch1 = new Chauffeur();
      $ch1 ->setNom('Nadir')
          ->setPrenom('Marouan')
          ->setEmail('nadir.ma89@gmail.com');
      $manager->persist($ch1); 
  
      $ch2 = new Chauffeur();
      $ch2->setNom('nadir')
          ->setPrenom('said')
          ->setEmail('nadirsaid@gmail.com');
      $manager->persist($ch2);

      $ch4 = new Chauffeur();
      $ch4->setNom('Perreira')
          ->setPrenom('Deigo')
          ->setEmail('deigo.perreira@gmail.com');
      $manager->persist($ch4);
  
      $ch5 = new Chauffeur();
      $ch5->setNom('Nassraoui')
          ->setPrenom('Wassim')
          ->setEmail('nassraouiwassim@gmail.com');
      $manager->persist($ch5);
  
      $ch6 = new Chauffeur();
      $ch6->setNom('Morta')
          ->setPrenom('David')
          ->setEmail('morta.david@gmail.com');
      $manager->persist($ch6);
  
      $re1 = new Reservation();
      $re1->setDate(new \DateTime())
         ->setKilometrage(4000)
         ->setChauffeur($ch2)
         ->setcamion($c);
      $manager->persist($re1);
  
      $re2 = new Reservation();
      $re2->setDate(new \DateTime())
         ->setKilometrage(95120)
         ->setChauffeur($ch1)
         ->setcamion($c);
      $manager->persist($re2);
  
      $re3 = new Reservation();
      $re3->setDate(new \DateTime())
         ->setKilometrage(13400)
         ->setChauffeur($ch4)
         ->setcamion($c);
      $manager->persist($re3);
  
      $re4 = new Reservation();
      $re4->setDate(new \DateTime())
         ->setKilometrage(185893)
         ->setChauffeur($ch5)
         ->setcamion($c);
      $manager->persist($re4);
  
      $re5 = new Reservation();
      $re5->setDate(new \DateTime())
         ->setKilometrage(212550)
         ->setChauffeur($ch1)
         ->setcamion($c);
      $manager->persist($re5);

   
      $t1 = new Tour();
      $t1->setNumero('B2')
         ->setDate(new \DateTime())
         ->setChauffeur($ch1);
      $manager->persist($t1);
  
      $t2 = new Tour();
      $t2->setNumero('AC5')
         ->setDate(new \DateTime())
         ->setChauffeur($ch2);
      $manager->persist($t2);
  
      $t3 = new Tour();
      $t3->setNumero('C24')
         ->setDate(new \DateTime())
         ->setChauffeur($ch1);
      $manager->persist($t3);
  
      $t4 = new Tour();
      $t4->setNumero('iG45')
         ->setDate(new \DateTime())
         ->setChauffeur($ch5);
      $manager->persist($t4);
  
      $t5 = new Tour();
      $t5->setNumero('iG45')
         ->setDate(new \DateTime())
         ->setChauffeur($ch4);
      $manager->persist($t5);

        $manager->flush();
    }
}
