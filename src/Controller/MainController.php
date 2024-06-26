<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    final public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('main/home.html.twig');
    }

    #[Route('/help', name: 'help')]
    final public function help(): Response
    {
        return $this->render('general/help.html.twig');
    }

    #[Route('/general', name: 'general')]
    final public function general(): Response
    {
        return $this->render('general/lobby.html.twig');
    }
}