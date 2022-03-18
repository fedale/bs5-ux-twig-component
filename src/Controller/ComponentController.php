<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComponentController extends AbstractController
{
    /**
     * @Route("/", name="app")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/bs5/accordion", name="bs5_accordion")
     */
    public function accordion(): Response
    {
        return $this->renderComponent('accordion');  
    }

    /**
     * @Route("/bs5/alert", name="bs5_alert")
     */
    public function alert(): Response
    {
        return $this->renderComponent('alert');
    }

    private function renderComponent(string $component = null): Response {

        return $this->render('bs5/' . $component .'.html.twig', [
            'component' => $component
        ]);
    }

}