<?php

namespace App\DataFixtures;
use src\Entity\Article;
use src\Entity\Color;
use src\Entity\Price;
use src\Entity\Reference;
use src\Entity\Size;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $colors =['black', 'white', 'yellow' , 'red'];
        $dataColors = [];
        for($i = 0; $i < count($colors); $i++){
            $color = new Color();// ici je met au monde une couleur
            $color -> setName($colors[$i]);// ici le $i correspond a l'index de mon tableau colors
            $dataColors[] = $color;
            $manager->persist($color);
        }
        
        $sizes =['XS', 'S', 'M', 'L' , 'XL'];
        $dataSizes = []; //il recupere les objets
        for($i = 0; $i < count($sizes); $i++){
            $size = new Size();// ici je met au monde une size
            $size -> setName($sizes[$i]);// ici le $i correspond a l'index de mon tableau size
            $dataSizes[] = $size;
            $manager->persist($size);
        }

        $prices =[19, 39, 59];
        $dataPrices = []; //il recupere les objets
        for($i = 0; $i < count($prices); $i++){
            $price = new Price();// ici je met au monde une size
            $price -> setName($prices[$i]);// ici le $i correspond a l'index de mon tableau size
            $dataPrices[] = $price;
            $manager->persist($price);
        }

        $articles =['XS', 'S', 'M', 'L' , 'XL'];
        $dataSizes = []; //il recupere les objets
        for($i = 0; $i < count($size); $i++){
            $size = new Size();// ici je met au monde une size
            $size -> setName($sizes[$i]);// ici le $i correspond a l'index de mon tableau size
            $dataSizes[] = $size;
            $manager->persist($size);
        }


        $titles = ['Dahu', 'Seoul', 'Auburn'];
        $images = [
            'https://thumbs.dreamstime.com/b/la-mode-v%C3%AAtx-l-illustration-bleue-de-forme-de-t-shirt-8229384.jpg',
            'https://img.myloview.fr/images/illustration-unique-de-vecteur-de-dessin-anime-t-shirt-bleu-700-145918035.jpg',
            'https://previews.123rf.com/images/siberica/siberica1601/siberica160100173/51442205-t-shirt-croquis-homme-isol%C3%A9-sur-fond-blanc-vector-illustration-.jpg'
        ];
        $dataTitles = []; //il recupere les objets
        for($i = 0; $i < count($titles); $i++){
            $title = new Reference();// ici je met au monde une size
            $title 
                -> setTitle($titles[$i])// ici le $i correspond a l'index de mon tableau size
                -> setSlug(strtolower($titles[$i]))
                -> setImage($images[$i])
                -> setPrice($prices[$i])
                -> setDescription(implode(' ', $faker->sentences($faker->randomDigitNotNull())))
                $dataTitle[] = $title;
            $manager->persist($title);
        }

        for($i = 0; $i < 15; $i++){
            $title = new Title();// ici je met au monde une size
            $title -> setName($titles[$i]);// ici le $i correspond a l'index de mon tableau size
            $dataTitle[] = $title;
            $manager->persist($title);
        }
        $manager->flush();
    }
}
