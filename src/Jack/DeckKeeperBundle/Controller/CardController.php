<?php

namespace Jack\DeckKeeperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Jack\DeckKeeperBundle\Entity\Card;

class CardController extends Controller
{
    public function indexAction()
    {
        $cards = $this
            ->getDoctrine()
            ->getRepository('JackDeckKeeperBundle:Card')
            ->findAll()
        ;

        return $this->render('JackDeckKeeperBundle:Card:index.html.twig', array(
            'cards' => $cards,
        ));
    }

    public function cardAction($slug)
    {
        $card = $this
            ->getDoctrine()
            ->getRepository('JackDeckKeeperBundle:Card')
            ->findOneBy(['slug' => $slug])
        ;

        if (!$card) {
            throw $this->createNotFoundException();
        }


        return $this->render('JackDeckKeeperBundle:Card:card.html.twig', array(
            'card' => $card,
        ));
    }
}
