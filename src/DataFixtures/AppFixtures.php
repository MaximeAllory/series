<?php

namespace App\DataFixtures;

use App\Entity\Serie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->addSeries($manager);


    }

    public function addSeries(ObjectManager $manager){

        $generator = Factory::create('fr_FR');



        for ($i=0; $i<50; $i++) {

            $serie = new Serie();
            $serie
                ->setBackdrop("backdrop.png")
                ->setDateCreated($generator->dateTimeBetween("- 20 years"))
                ->setGenres($generator->randomElement(["western", "SF", "drama", "comedy", "Thriller"]))
                ->setName($generator->word.$i)
                ->setFirstAirDate($generator->dateTimeBetween("- 10 years", "-1 year"))
                ->setLastAirDate($generator->dateTimeBetween("- 2 month"))
                ->setPopularity($generator->numberBetween(0,1000))
                ->setPoster("poster.png")
                ->setStatus("canceled")
                ->setTmdbId(123456)
                ->setVote(5)
                ->setDateModified(new \DateTime());

            $manager->persist($serie);

        }

        $manager->flush();

    }
}
