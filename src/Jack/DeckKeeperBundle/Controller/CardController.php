<?php

namespace Jack\DeckKeeperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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

    /**
     * @ParamConverter("card", class="JackDeckKeeperBundle:Card")
     */
    public function cardAction(Card $card)
    {
        return $this->render('JackDeckKeeperBundle:Card:card.html.twig', array(
            'card' => $card,
        ));
    }
}
