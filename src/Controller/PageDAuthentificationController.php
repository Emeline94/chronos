<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageDAuthentificationController extends AbstractController
{
    /**
     * @Route("/page/d/authentification", name="page_d_authentification")
     */
    public function index()
    {
        return $this->render('page_d_authentification/index.html.twig', [
            'controller_name' => 'PageDAuthentificationController',
        ]);
    }
}
