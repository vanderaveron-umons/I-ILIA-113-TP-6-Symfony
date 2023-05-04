<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=1;$i<=50;$i++){
            $article = new Article();
            $article->setNom("Titre N° $i")
                ->setPrix(693 + $i)
                ->setDetails("les details de cet article sont : $i")
                ->setphoto("http://placehold.it/350x150");
            $manager->persist($article);
        }

        $manager->flush();
    }
}
