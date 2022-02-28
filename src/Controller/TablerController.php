<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TablerController extends AbstractController
{
    /**
     * @Route("/", name="app_tabler")
     */
    public function index(): Response
    {
        return $this->render('tabler/index.html.twig', [
            'controller_name' => 'TablerController',
        ]);
    }
}
