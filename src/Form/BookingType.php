<?php

namespace App\Form;

use App\Entity\Batiment;
use App\Entity\Booking;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginAt')
            ->add('endAt')
            ->add('title')
            ->add('responsable')
            ->add('number')
            ->add('arrive')
            ->add('depart')
            ->add('taille_terrain')
            ->add('nom_terrain')
            ->add('batiment', EntityType::class,[
                'class' => Batiment::class,
                'choice_label'=> 'name',
                'multiple' => false,
                'required' => false
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
