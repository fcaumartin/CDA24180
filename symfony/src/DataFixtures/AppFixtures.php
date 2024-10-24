<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Entity\User;
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
        $manager->persist($sc1);

        $sc2 = new Categorie();
        $sc2->setNom("Guitares classiques");
        $sc2->setImage("");
        $sc2->setParent($c1);
        $manager->persist($sc2);

        $sc3 = new Categorie();
        $sc3->setNom("Guitares ...");
        $sc3->setImage("");
        $sc3->setParent($c1);
        // $c1->addCategory($sc3);
        $manager->persist($sc3);
        




        $p1 = new Produit();
        $p1->setNom("Guitare 1");
        $p1->setImage("");
        $p1->setDescription("Elle brille !!!");
        $p1->setPrix(9999.99);
        $p1->setCategorie($sc1);
        // $sc1->addProduit($p1);

        $manager->persist($p1);


        $p2 = new Produit();
        $p2->setNom("Guitare 2");
        $p2->setImage("");
        $p2->setDescription("Elle brille !!!");
        $p2->setPrix(9999.99);
        $p2->setCategorie($sc1);
        // $sc1->addProduit($p2);

        $manager->persist($p2);


        $p3 = new Produit();
        $p3->setNom("Guitare 3");
        $p3->setImage("");
        $p3->setDescription("Elle brille !!!");
        $p3->setPrix(9999.99);
        $p3->setCategorie($sc1);
        // $sc1->addProduit($p3);

        $manager->persist($p3);


        $u1 = new User();
        $u1->setEmail("toto@afpa.fr");
        $u1->setRoles(['ROLE_USER', 'ROLE_ADMIN', 'ROLE_GESTION']);
        $u1->setPassword("1234");
        $u1->setPrenom("To");
        $u1->setNom("To");
        $u1->setAdresse("To");

        $manager->persist($u1);

        $manager->flush();
    }
}
