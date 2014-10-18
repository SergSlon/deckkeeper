<?php

namespace Jack\DeckKeeperBundle;

use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Jack\DeckKeeperBundle\Entity\Card;

class CardLogger
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logCard(Card $card)
    {
        $this->logger->alert(sprintf('Card "%s" has been seen', $card->getName()));
    }
}
