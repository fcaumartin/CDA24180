<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        
        
        
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    #[Route('/test2', name: 'app_test2')]
    public function index2(): Response
    {
        
        
        
        return $this->render('test/test2.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
