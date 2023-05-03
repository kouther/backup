<?php

namespace App\Form;

use App\Entity\Score;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ScoreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('scoreDossier', NumberType::class, [
                'disabled' => true
                
            ])
            ->add('scoreEtab', NumberType::class, [
                
                "label" => "Score d'établissement",

            ])
            
            
            ->add('formuleEtab', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
                'label' => 'Formule',
                "label" => "Formule appliqué pour calculer le score d'éatblissement",
            ])
            ->add('total', NumberType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Score::class,
        ]);
    }
}
