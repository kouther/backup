<?php

namespace App\Form;

use App\Entity\Validation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ValidateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('master')
            ->add('university')
            ->add('action', ChoiceType::class, [
                'choices'  => [
                    'Réfusé' => 'refusé',
                    'Accepté'=> [
                        'Liste principal' => 'liste principal',
                        'Liste d attente' => 'Liste d attente',
                    ],
                ],
            ])
            ->add('commentaire', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
            ])
            ->add('commission')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Validation::class,
        ]);
    }
}
