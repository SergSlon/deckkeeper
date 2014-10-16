<?php

namespace Jack\DeckKeeperBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Jack\DeckKeeperBundle\Entity\CardSet;

class LoadCardSetData implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 10;
    }

    public function load(ObjectManager $manager)
    {
        $cardSet = new CardSet();
        $cardSet->setName('Khans of Tarkir');
        $cardSet->setYear(2014);
        $manager->persist($cardSet);

        $manager->flush();
    }
}
