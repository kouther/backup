<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('name')
            ->add('lastname')
            ->add('cin')
            ->add('phone')
            ->add('date')
            ->add('birth')
            ->add('gender')
            ->add('address')
            ->add('country')
            ->add('city')
            ->add('zipcode')
            ->add('situation')
            ->add('isVerified')
            ->add('cursus')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
