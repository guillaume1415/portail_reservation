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
                'label' => "heure d'ariver au batiment",
                'date_label' => '2019-m-d H:i'
            ])
            ->add('endAt', dateType::class, [
                'label' => "heure de départ du batiment"
            ])
            ->add('title', textType::class, [
                'label' => "non de l'association"
            ])
            ->add('nome_salle', textType::class, [
                'label' => "nom de la Salle"
            ])
            ->add('strat_arrive', dateType::class, [
                'label' => "heure du début de d'activité"
            ])
            ->add('bake', dateType::class, [
                'label' => "heure de la fin d'activité"
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
