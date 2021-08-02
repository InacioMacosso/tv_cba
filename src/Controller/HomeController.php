<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\Category;
use App\Entity\Mundo;
use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        /*
        $mailer = new Mail();
        $mailer->send("inaciomacosso@yahoo.com", "Reuniao", "Reuniao", "Cjgjgjglg kgjkgjkgjklg kfkfkllfkf lfjjjfl");
       */

        $news=$this->entityManager->getRepository(News::class)->findAll();
        $newsBest=$this->entityManager->getRepository(News::class)->findBy(['isBest'=>true], ['date'=>'ASC']);
        $mundo=$this->entityManager->getRepository(Mundo::class)->findOneBy(['name'=>'Cabinda'])->getId();
        $cabinda=$this->entityManager->getRepository(News::class)->findBy(['mundo'=>$mundo], ['date'=>'DESC'], 5);
        return $this->render('news/index.html.twig', [
            'news'=>$news,
            'newsBest'=>$newsBest,
            'cabinda'=>$cabinda
        ]);
    }

    /**
     * @Route("/noticia/{slug}", name="show_news")
     */
    public function show($slug): Response
    {
        $noticia = $this->entityManager->getRepository(News::class)->findOneBySlug($slug);
        if (!$noticia)
        {
            return $this->redirectToRoute('news');
        }
        return $this->render('news/show.html.twig', [
            'noticia'=>$noticia
        ]);
    }
}
