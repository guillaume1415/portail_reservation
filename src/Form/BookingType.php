<?php

namespace App\Form;

use App\Entity\Batiment;
use App\Entity\Booking;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

class BookingType extends AbstractType
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginAt', datetimeType::class, [
                'widget' => 'single_text',
                'label' => "heure d'arriver au batiment",
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('endAt', datetimeType::class, [
                'widget' => 'single_text',
                'label' => "heure d'arriver au batiment",
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('title')
            ->add('responsable')
            ->add('number')
            ->add('taille_terrain')
            ->add('nom_terrain')
            ->add('batiment', EntityType::class, [
                'class' => Batiment::class,
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false
            ]);
//            ->add('name_assosiation', EntityType::class, [
//                'class' => User::class,
//                'multiple' => false,
//                'required' => false
//            ]);
        $user = $this->security->getUser();
        $Roles = $user->getRoles();
        if ($Roles[0] == "ROLE_ADMIN") {
            $builder->add('state', CheckboxType::class, [
                'disabled' => false,
                'label' => 'Satue',
                'required' => false,
            ]);
        } else {
            $builder->add('state', HiddenType::class, [
                'disabled' => true,
                'label' => 'Satue',
                'required' => false,
            ]);
        }


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
