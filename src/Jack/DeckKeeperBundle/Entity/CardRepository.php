<?php

namespace Jack\DeckKeeperBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CardRepository extends EntityRepository
{
    public function findToughnessGreaterThen($toughness)
    {
        $qb = $this->createQueryBuilder('c');
        $qb
            ->where('c.toughness >= :t')
            ->setParameters(['t' => $toughness])
        ;

        return $qb->getQuery()->execute();

    }
}
