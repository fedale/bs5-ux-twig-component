<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TablerController extends AbstractController
{
    /**
     * @Route("/bs5/accordion", name="bs5_accordion")
     */
    public function accordion(): Response
    {
        return $this->render('bs5/accordion.html.twig', [
            'title' => 'Accordion',
        ]);
    }

    /**
     * @Route("/bs5/alert", name="bs5_alert")
     */
    public function alert(): Response
    {
        return $this->render('bs5/alert.html.twig', [
            'title' => 'Alert'
        ]);
    }
}
