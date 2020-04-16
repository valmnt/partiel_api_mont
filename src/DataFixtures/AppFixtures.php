<?php

namespace App\DataFixtures;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Style;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encodePassword;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {
        $this->encodePassword = $userPasswordEncoderInterface;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $styles = [];
        $artist = [];

        for ($j = 0; $j < 10; $j++) {
            $style = new Style();
            $style->setName($faker->word());

            $manager->persist($style);
            $styles[] = $style;
        }

        for ($i = 0; $i < 20; $i++) {
            $artist = new Artist();
            $artist->setName($faker->word())
                ->addStyle($styles[$faker->numberBetween('0', count($styles) - 1)])
                ->setStartYear($faker->numberBetween(1950, 2005));

            $manager->persist($artist);
            $artists[] = $artist;


            $album = new Album();
            $album->setName($faker->word())
                ->setArtist($artist)
                ->setReleaseYear($faker->numberBetween(1950, 2020));

            $manager->persist($album);
        }

        for ($k = 0; $k < 5; $k++) {
            $user = new User();
            $user->setEmail('test' . $k . '@test.com')
                ->setPassword($this->encodePassword->encodePassword($user, "user"))
                ->addArtist($artists[$faker->numberBetween('0', count($artists) - 1)]);

            $manager->persist($user);
        }


        $manager->flush();
    }
}
