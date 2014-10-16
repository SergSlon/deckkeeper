<?php

namespace Jack\DeckKeeperBundle\DataFixtures\ORM;

use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Jack\DeckKeeperBundle\Entity\Card;
use Jack\DeckKeeperBundle\Proxy\CardProxy;

class LoadCardData implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 20;
    }

    public function load(ObjectManager $manager)
    {
        $khansOfTarkir = $manager
            ->getRepository('JackDeckKeeperBundle:CardSet')
            ->findOneBy(array('slug'=>'khans-of-tarkir'))
        ;

        $abzanBattlePriest = new Card();
        $abzanBattlePriest
            ->setCardSet($khansOfTarkir)
            ->setName('Abzan Battle Priest')
            ->setManaCost('3W')
            ->setType('Creature')
            ->setSubType('Human Cleric')
            ->setDescription('Outlast {W} ({W}, {T}: Put a +1/+1 counter on this creature. Outlast only as a sorcery.)
                Each creature you control with a +1/+1 counter on it has lifelink.')
            ->setArtisticdescription('"Wherever I walk, the ancestors walk too."')
            ->setRarity('Uncommon')
            ->setPower(3)
            ->setToughness(2)
            ->setArtist('Chris Rahn')
            ->setNumber(1)
        ;
        $manager->persist($abzanBattlePriest);


        $abzanFalconer = new Card();
        $abzanFalconer
            ->setCardSet($khansOfTarkir)
            ->setName('Abzan Falconer')
            ->setManaCost('2W')
            ->setType('Creature')
            ->setSubType('Human Soldier')
            ->setDescription('Outlast {W} ({W}, {T}: Put a +1/+1 counter on this creature. Outlast only as a sorcery.)
                Each creature you control with a +1/+1 counter on it has flying.')
            ->setArtisticdescription('"The fastest way across the dunes is above."')
            ->setRarity('Uncommon')
            ->setPower(2)
            ->setToughness(3)
            ->setArtist('Steven Belledin')
            ->setNumber(2)
        ;
        $manager->persist($abzanFalconer);

        $erase = new Card();
        $erase
            ->setCardSet($khansOfTarkir)
            ->setName('Erase')
            ->setManaCost('W')
            ->setType('Instant')
            ->setDescription('Exile target enchantment.')
            ->setArtisticdescription('"Truth is hard enough to see, let alone understand. We must remove all distractions to find clarity."
                —Zogye, wandering sage')
            ->setRarity('Common')
            ->setArtist('Zack Stella')
            ->setNumber(9)
        ;
        $manager->persist($erase);

        $manager->flush();
    }
}
