<?php

namespace Jack\DeckKeeperBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('cardSet', 'entity', array(
                'class'    => 'Jack\DeckKeeperBundle\Entity\CardSet',
                'label'    => 'Set',
                'expanded' => false,
                'multiple' => false,
            ))
            ->add('manaCost')
            ->add('type')
            ->add('subType')
            ->add('description')
            ->add('artisticdescription')
            ->add('rarity')
            ->add('power')
            ->add('toughness')
            ->add('artist')
            ->add('number')
        ;

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jack\DeckKeeperBundle\Entity\Card',
        ));
    }

    public function getName()
    {
        return 'card';
    }
}
