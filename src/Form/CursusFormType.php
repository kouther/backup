<?php

namespace App\Form;

use App\Entity\Cursus;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UuidType;



class CursusFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bacdate', NumberType::class, [
                'label' => 'Année du bac ',

            ] )
            ->add('bacsection' ,ChoiceType::class, [
                'label' => 'Section',

                'choices'  => [
                    'Informatique' => "Informatique",
                    'Mathématiques' => "Mathématiques",
                    'Sciences expérimentales' => "Sciences expérimentales",
                    'Sciences Techniques' => "Sciences Techniques",
                    'Economie et gestion' =>"Economie et gestion",
                    'Lettre' => "Lettre",
                    'Sport' => "Sport",

              
                ],
            ])
            ->add('bacmention',ChoiceType::class, [
                'label' => 'Mention',

                'choices'  => [
                    'Passable' => "Passable",
                    'Assez Bien' => "Assez Bien",
                    'Bien' => "Bien",
                    'Trés Bien' =>"Trés Bien",
              
                ],
            ])
            ->add('bacsession' ,ChoiceType::class, [
                'label' => 'Session',

                'choices'  => [
                    'Principal' => "Principal",
                    'Contrôle' => "Contrôle",

              
                ],
            ])
            ->add('diplome', ChoiceType::class, [
                'label'=>'Dernier diplôme obtenu',
                'choices'  => [
                    'Licence appliquée' => "Licence appliquée",
                    'Maîtrise' => "Maîtrise",
                    'Ingénieur' => "Ingénieur",
                    'Mastère professionnel' =>"Mastère professionnel",
                    'Diplôme d études supérieures techniques' =>"Mastère professionnel",
                    'Mastère de recherche' =>"Mastère de recherche",
                ],
            ])
            ->add('bacmoyenne', NumberType::class, [
                'label' => 'Moyenne du bac',
                ])
            ->add('etablissement')
            ->add('anneeunivesitaire', NumberType::class, [
                'label' => 'Année Universitaire',
                ])
            ->add('domaine')
            ->add('specialite', TextType::class, [
                'label' => 'Spécialité',
                ])
            ->add('redoublement', ChoiceType::class, [
                'choices'  => [
                    0 => 0,
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                ],
            ])  
            ->add('anneeun', TextType::class, [
                'label' => ' ',
                ])
            ->add('Mentionun', ChoiceType::class, [
                'label' => ' ',

                'choices'  => [
                    'Passable' => 0,
                    'Assez Bien' => 1,
                    'Bien' => 2,
                    'Trés Bien' =>3,
              
                ],
            ])
            ->add('moyenun', NumberType::class, [
                'label' => ' ',
                ])
            ->add('ratrappageun', ChoiceType::class, [
                'label' => ' ',

                'choices'  => [
                    'Principal' => 0,
                    'Contrôle' => 0.5,

              
                ],
            ])
            ->add('anneedeux', TextType::class, [
                'label' => ' ',
                ])
            ->add('Mentiondeux', ChoiceType::class, [
                'label' => ' ',

                'choices'  => [
                    'Passable' => 0,
                    'Assez Bien' => 1,
                    'Bien' => 2,
                    'Trés Bien' =>3,
              
                ],
            ])
            ->add('moyendeux', NumberType::class, [
                'label' => ' ',
                ])
            ->add('ratrappagedeux', ChoiceType::class, [
                'label' => ' ',

                'choices'  => [
                    'Principal' => 0,
                    'Contrôle' => 0.5,

              
                ],
            ])
            ->add('anneetrois', TextType::class, [
                'label' => ' ',
                ])
            ->add('mentiontrois', ChoiceType::class, [
                'label' => ' ',

                'choices'  => [
                    'Passable' => 0,
                    'Assez Bien' => 1,
                    'Bien' => 2,
                    'Trés Bien' =>3,
              
                ],
            ])
            ->add('moyentrois', NumberType::class, [
                'label' => ' ',
                ])
            ->add('ratrappagetrois', ChoiceType::class, [
                'label' => ' ',

                'choices'  => [
                    'Principal' => 0,
                    'Contrôle' => 0.5,

              
                ],
            ])
            ->add('user');
            
       
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cursus::class,
        ]);
    }
}
