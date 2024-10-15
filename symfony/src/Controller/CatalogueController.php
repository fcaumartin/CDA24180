<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CatalogueController extends AbstractController
{
    #[Route('/', name: 'app_catalogue')]
    public function index(CategorieRepository $repo): Response
    {

        $liste = $repo->findBy([
            "parent" => null
        ]);

        return $this->render('catalogue/index.html.twig', [
            'categories' => $liste,
        ]);
    }

    // #[Route('/categorie/{id}', name: 'app_catalogue_categorie')]
    // public function categorie($id, CategorieRepository $repo): Response
    // {

    //     $categorie = $repo->find($id);

    //     return $this->render('catalogue/categorie.html.twig', [
    //         'categorie' => $categorie
    //     ]);
    // }


    #[Route('/categorie/{id}', name: 'app_catalogue_categorie')]
    public function categorie(Categorie $id): Response
    {

        return $this->render('catalogue/categorie.html.twig', [
            'categorie' => $id
        ]);
    }

    #[Route('/produits/{id}', name: 'app_catalogue_produits')]
    public function produits(Categorie $id): Response
    {

        return $this->render('catalogue/produits.html.twig', [
            'categorie' => $id
        ]);
    }
}
