<?php

namespace App\Form;

use App\Entity\Batiment;
use App\Entity\Demande;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginAt', datetimeType::class, [
                'widget' => 'single_text',
                'label' => "heure d'arriver au batiment",
//                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('endAt', datetimeType::class, [
                'label' => "heure de départ du batiment",
                'widget' => 'single_text',
//                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('title', textType::class, [
                'label' => "non de l'association"
            ])
            ->add('nome_salle', textType::class, [
                'label' => "nom de la Salle"
            ])
            ->add('Batiment', EntityType::class,[
                'class' => batiment::class,
                'choice_label'=> 'name',
                'multiple' => false,
                'required' => false
            ])
            ->add('taille_terrain', textType::class, [
                'label' => "taille du terrain"
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}
