<?php

namespace App\Controller;

use App\Form\ToastFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/bs5/badge", name="bs5_badge")
     */
    public function badge(): Response
    {
        return $this->renderComponent('badge');
    }

    /**
     * @Route("/bs5/breadcrumb", name="bs5_breadcrumb")
     */
    public function breadcrumb(): Response
    {
        return $this->renderComponent('breadcrumb');
    }

    /**
     * @Route("/bs5/button", name="bs5_button")
     */
    public function button(): Response
    {
        return $this->renderComponent('button');
    }

    /**
     * @Route("/bs5/button_group", name="bs5_button_group")
     */
    public function buttonGroup(): Response
    {
        return $this->renderComponent('button_group');
    }

    /**
     * @Route("/bs5/card", name="bs5_card")
     */
    public function card(): Response
    {
        return $this->renderComponent('card');
    }

    /**
     * @Route("/bs5/carousel", name="bs5_carousel")
     */
    public function carousel(): Response
    {
        return $this->renderComponent('carousel');
    }

    /**
     * @Route("/bs5/list_group", name="bs5_list_group")
     */
    public function listGroup(): Response
    {
        return $this->renderComponent('list_group');
    }

    /**
     * @Route("/bs5/pagination", name="bs5_pagination")
     */
    public function pagination(): Response
    {
        return $this->renderComponent('pagination');
    }

    /**
     * @Route("/bs5/modal", name="bs5_modal")
     */
    public function modal(): Response
    {
        return $this->renderComponent('modal');
    }

    /**
     * @Route("/bs5/toast", name="bs5_toast")
     */
    public function toast(Request $request): Response
    {
        $form = $this->createForm(ToastFormType::class);
        $form->handleRequest($request);
        $component = 'toast';

        if ($form->isSubmitted() && $form->isValid() ) {
            dump('OK');
        }

        return $this->renderForm('bs5/' . $component .'.html.twig', [
            'component' => $component,
            'toast_form' => $form
        ]);
    }

    /**
     * 
     */
    private function renderComponent(string $component = null): Response {

        return $this->render('bs5/' . $component .'.html.twig', [
            'component' => $component
        ]);
    }

}