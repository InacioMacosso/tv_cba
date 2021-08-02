<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryNewsController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }
    /**
     * @Route("/categoria/politica", name="category_politica")
     */
    public function getPolitica(): Response
    {
        $categoria=$this->entityManager->getRepository(Category::class)->findOneBy(['name'=>'Política'])->getId();
        $politica=$this->entityManager->getRepository(News::class)->findBy(['category'=>$categoria]);
        if (!$politica){
            return $this->redirectToRoute("home");
        }
        return $this->render('category_news/politica.html.twig', [
            'politica' => $politica
        ]);
    }

    /**
     * @Route("/categoria/economia", name="category_economia")
     */
    public function getEconomia(): Response
    {
        $categoria=$this->entityManager->getRepository(Category::class)->findOneBy(['name'=>'Economia'])->getId();
        $economia=$this->entityManager->getRepository(News::class)->findBy(['category'=>$categoria]);
        if (!$economia){
            return $this->redirectToRoute("home");
        }
        return $this->render('category_news/economia.html.twig', [
            'economia' => $economia
        ]);
    }

    /**
     * @Route("/categoria/cultura", name="category_cultura")
     */
    public function getCultura(): Response
    {
        $categoria=$this->entityManager->getRepository(Category::class)->findOneBy(['name'=>'Cultura'])->getId();
        $cultura=$this->entityManager->getRepository(News::class)->findBy(['category'=>$categoria]);
        if (!$cultura){
            return $this->redirectToRoute("home");
        }
        return $this->render('category_news/cultura.html.twig', [
            'cultura' => $cultura
        ]);
    }

    /**
     * @Route("/categoria/ciencia", name="category_ciencia")
     */
    public function getCiencia(): Response
    {
        $categoria=$this->entityManager->getRepository(Category::class)->findOneBy(['name'=>'Ciência'])->getId();
        $ciencia=$this->entityManager->getRepository(News::class)->findBy(['category'=>$categoria]);
        if (!$ciencia){
            return $this->redirectToRoute("home");
        }
        return $this->render('category_news/ciencia.html.twig', [
            'ciencia' => $ciencia
        ]);
    }

    /**
     * @Route("/categoria/educacao", name="category_educacao")
     */
    public function getEducacao(): Response
    {
        $categoria=$this->entityManager->getRepository(Category::class)->findOneBy(['name'=>'Educação'])->getId();
        $educacao=$this->entityManager->getRepository(News::class)->findBy(['category'=>$categoria]);
        if (!$educacao){
            return $this->redirectToRoute("home");
        }
        return $this->render('category_news/educacao.html.twig', [
            'educacao' => $educacao
        ]);
    }

    /**
     * @Route("/categoria/saude", name="category_saude")
     */
    public function getSaude(): Response
    {
        $categoria=$this->entityManager->getRepository(Category::class)->findOneBy(['name'=>'Saúde'])->getId();
        $saude=$this->entityManager->getRepository(News::class)->findBy(['category'=>$categoria]);
        if (!$saude){
            return $this->redirectToRoute("home");
        }
        return $this->render('category_news/saude.html.twig', [
            'saude' => $saude
        ]);
    }

    /**
     * @Route("/categoria/viagens", name="category_viagens")
     */
    public function getViagens(): Response
    {
        $categoria=$this->entityManager->getRepository(Category::class)->findOneBy(['name'=>'Viagens'])->getId();
        $viagens=$this->entityManager->getRepository(News::class)->findBy(['category'=>$categoria]);
        if (!$viagens){
            return $this->redirectToRoute("home");
        }
        return $this->render('category_news/viagens.html.twig', [
            'viagens' => $viagens
        ]);
    }

    /**
     * @Route("/categoria/negocios", name="category_negocios")
     */
    public function getNegocios(): Response
    {
        $categoria=$this->entityManager->getRepository(Category::class)->findOneBy(['name'=>'Negócios'])->getId();
        $negocios=$this->entityManager->getRepository(News::class)->findBy(['category'=>$categoria]);
        if (!$negocios){
            return $this->redirectToRoute("home");
        }
        return $this->render('category_news/negocios.html.twig', [
            'negocios' => $negocios
        ]);
    }

    /**
     * @Route("/categoria/estilo-de-vida", name="category_estilo_de_vida")
     */
    public function getEstiloDeVida(): Response
    {
        $categoria=$this->entityManager->getRepository(Category::class)->findOneBy(['name'=>'Estilo de vida'])->getId();
        $estilo_de_vida=$this->entityManager->getRepository(News::class)->findBy(['category'=>$categoria]);
        if (!$estilo_de_vida){
            return $this->redirectToRoute("home");
        }
        return $this->render('category_news/estilo_de_vida.html.twig', [
            'estilo_de_vida' => $estilo_de_vida
        ]);
    }

    /**
     * @Route("/categoria/tecnologia", name="category_tecnologia")
     */
    public function getTecnologia(): Response
    {
        $categoria=$this->entityManager->getRepository(Category::class)->findOneBy(['name'=>'Tecnologia'])->getId();
        $tecnologia=$this->entityManager->getRepository(News::class)->findBy(['category'=>$categoria]);
        if (!$tecnologia){
            return $this->redirectToRoute("home");
        }
        return $this->render('category_news/tecnologia.html.twig', [
            'tecnologia' => $tecnologia
        ]);
    }

    /**
     * @Route("/categoria/sociedade", name="category_sociedade")
     */
    public function getSociedade(): Response
    {
        $categoria=$this->entityManager->getRepository(Category::class)->findOneBy(['name'=>'Sociedade'])->getId();
        $sociedade=$this->entityManager->getRepository(News::class)->findBy(['category'=>$categoria]);
        if (!$sociedade){
            return $this->redirectToRoute("home");
        }
        return $this->render('category_news/sociedade.html.twig', [
            'sociedade' => $sociedade
        ]);
    }
}
