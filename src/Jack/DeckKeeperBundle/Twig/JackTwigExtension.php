<?php

namespace Jack\DeckKeeperBundle\Twig;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class JackTwigExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'timeSince' => new \Twig_Filter_Method($this, 'timeSinceFilter'),
            'timeUntil' => new \Twig_Filter_Method($this, 'timeUntilFilter'),
        );
    }

    public function timeSinceFilter($date)
    {
        $dateTimestamp = $date instanceof \DateTime ? $date->format('U') : strtotime($date);
        $words = $this->getPeriodWords(time() - $dateTimestamp);

        return $words . ' ago';
    }

    public function timeUntilFilter($date)
    {
        $dateTimestamp = $date instanceof \DateTime ? $date->format('U') : strtotime($date);
        $words = $this->getPeriodWords($dateTimestamp - time());

        return $words;

    }

    public function getName()
    {
        return 'Jack';
    }

    protected function getPeriodWords($seconds)
    {
        if ($seconds<60) {
            // <1 minute
            $words = 'a few seconds';
        } elseif ($seconds<120) {
            // <2 minute
            $words = 'a few minutes';
        } elseif ($seconds<60*60*2) {
            // <2 hour
            $period = floor($seconds/60);
            $words = $period.' '.($period > 1 ? 'minutes' : 'minute');
        } elseif ($seconds<60*60*48) {
            // <2 days
            $period = floor($seconds/(60*60));
            $words = $period.' '. ($period > 1 ? 'hours' : 'hour');
        } elseif ($seconds<(60*60*24*60)) {
            // <2 weeks
            $period = floor($seconds/(60*60*24));
            $words = $period.' '.($period > 1 ? 'days' : 'day');
        } elseif ($seconds<60*60*24*365*2) {
            // <2 years
            $period = floor($seconds/(60*60*24*30.5));
            $words = $period.' '.($period > 1 ? 'months' : 'month');
        } else {
            // more than 2 years
            $period = floor($seconds/(60*60*24*365));
            $words = $period.' '.($period > 1 ? 'years' : 'year');
        }

        return $words;
    }
}
