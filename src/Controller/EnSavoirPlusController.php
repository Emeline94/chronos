<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EnSavoirPlusController extends AbstractController
{
    /**
     * @Route("/en/savoir/plus", name="en_savoir_plus")
     */
    public function index()
    {
        return $this->render('en_savoir_plus/index.html.twig', [
            'controller_name' => 'EnSavoirPlusController',
        ]);
    }
}
