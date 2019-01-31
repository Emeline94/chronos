<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageMaterielController extends AbstractController
{
    /**
     * @Route("/page/materiel", name="page_materiel")
     */
    public function index()
    {
        return $this->render('page_materiel/index.html.twig', [
            'controller_name' => 'PageMaterielController',
        ]);
    }
}
