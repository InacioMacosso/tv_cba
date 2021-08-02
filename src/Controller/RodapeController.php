<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RodapeController extends AbstractController
{
    /**
     * @Route("/rodape/sobre-tv-cabinda", name="rodape_sobre")
     */
    public function sobre(): Response
    {
        return $this->render('rodape/sobre.html.twig');
    }
    /**
     * @Route("/rodape/trabalhar-conosco", name="rodape_trabalhar")
     */
    public function trabalhar(): Response
    {
        return $this->render('rodape/trabalhar.html.twig');
    }
    /**
     * @Route("/rodape/falar-conosco", name="rodape_falar")
     */
    public function falar(): Response
    {
        return $this->render('rodape/falar.html.twig');
    }
    /**
     * @Route("/rodape/termos-e-condiçoes-de-uso", name="rodape_termos")
     */
    public function termos(): Response
    {
        return $this->render('rodape/termos.html.twig');
    }
}
