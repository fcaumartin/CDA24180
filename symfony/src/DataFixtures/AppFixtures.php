<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $c1 = new Categorie();
        $c1->setNom("Guitares");
        $c1->setImage("");
        
        $manager->persist($c1);


        $c2 = new Categorie();
        $c2->setNom("Clavier");
        $c2->setImage("");
        
        $manager->persist($c2);


        $c3 = new Categorie();
        $c3->setNom("Percussions");
        $c3->setImage("");
        
        $manager->persist($c3);


        $sc1 = new Categorie();
        $sc1->setNom("Guitares Electriques");
        $sc1->setImage("");
        $sc1->setParent($c1);
        // $c1->addCategory($sc1);
        
        $manager->persist($sc1);




        $p1 = new Produit();
        $p1->setNom("Guitare 1");
        $p1->setImage("");
        $p1->setDescription("Elle brille !!!");
        $p1->setPrix(9999.99);
        $p1->setCategorie($sc1);
        // $sc1->addProduit($p1);

        $manager->persist($p1);


        $manager->flush();
    }
}
