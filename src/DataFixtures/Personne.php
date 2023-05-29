<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Personne extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $personne = new Personne();
            $personne->setFirstname($faker->firstname);
            $personne->setName($faker->name);
            $personne->setAge($faker->numberBetween(18, 65));
        //$product = new Product();

            $manager->persist($product);
        }
        $manager->flush();
    }
}
