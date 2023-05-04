<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class MyController extends AbstractController
{
    #[Route('/lucky/number', name: 'number')]
    public function number()
    {
        $nom = "Votre Nom ";
        $number = random_int(0, 1000);
        return $this->render('lucky/number.html.twig', ['number' => $number, 'nom' => $nom,]);
    }


    #[Route('/home', name: 'home')]
    public function home()
    {
        return $this->render('home/home.html.twig');
    }

    #[Route('/articles', name: 'articles')]
    public function articles(ArticleRepository $repo)
    {
        $articles = $repo->findAll();
        return $this-> render('articles/articles.html.twig',['articles'=>$articles,]);
    }

    #[Route('/articles/{id}', name: 'detailsarticle')]
    public function Detailsarticle(Article $article) {
        return $this-> render('articles/detailsarticle.html.twig',
            ['article'=>$article,]);
    }


    #[Route('/articles/delete/{id}', name: 'deletearticle')]
    public function Deletearticle(Article $article, EntityManagerInterface $entityManager) {
        $entityManager->remove($article);
        $entityManager->flush();

        return $this->redirectToRoute('articles');
    }


    #[Route('/register', name: 'app_register')]
    public function register()
    {
        return $this->render('articles/articles.html.twig');
    }
}