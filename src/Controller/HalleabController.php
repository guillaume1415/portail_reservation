<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HalleabController extends AbstractController
{
    /**
     * @Route("/halleab", name="halleab")
     */
    public function index()
    {
        return $this->render('halleab/index.html.twig', [
            'controller_name' => 'HalleabController',
        ]);
    }
}
