<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

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
}
