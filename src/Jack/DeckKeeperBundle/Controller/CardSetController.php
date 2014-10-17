<?php

namespace Jack\DeckKeeperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Jack\DeckKeeperBundle\Entity\CardSet;

class CardSetController extends Controller
{
    public function indexAction()
    {
        $sets = $this
            ->getDoctrine()
            ->getRepository('JackDeckKeeperBundle:CardSet')
            ->findAll()
        ;

        return $this->render('JackDeckKeeperBundle:CardSet:index.html.twig', array(
            'sets' => $sets,
        ));
    }
}
