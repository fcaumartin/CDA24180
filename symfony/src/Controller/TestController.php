<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Form\ContactType;
use App\Form\ProduitType;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    #[Route('/form', name: 'app_form')]
    public function form(Request $request, MailerInterface $mailer): Response
    {
        
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $sujet = $data["sujet"];
            $message = $data["message"];
            $from = $data["from"];

            $email = new Email();

            $email->from($from);
            $email->to('admin@villagegreen.com');
            $email->subject($sujet);
            $email->text($message);
            $email->html("<p>$message</p>");

            $mailer->send($email);



            
            return $this->redirect("/");
        }


        
        return $this->render('test/form.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/add_produit', name: 'app_add_produit')]
    public function add_produit(Request $request, EntityManagerInterface $manager): Response
    {
        $p = new Produit();
        
        $form = $this->createForm(ProduitType::class, $p);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            
            // dd($p);
            $manager->persist($p);
            $manager->flush();

        }


        
        return $this->render('test/produit.html.twig', [
            'form' => $form,
        ]);
    }
}
