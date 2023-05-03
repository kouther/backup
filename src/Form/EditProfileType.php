<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true
                
            ])
            ->add('name', TextType::class)
            ->add('lastname', TextType::class)
            ->add('cin', NumberType::class)
            ->add('phone', TelType::class)
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
            ])
            ->add('birth', TextType::class)
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'Femme' => "femme",
                    'Homme' => "homme",
                ],
            ])
            ->add('address', TextType::class)
            ->add('country', TextType::class)
            ->add('city', TextType::class)
            ->add('zipcode', NumberType::class)
            ->add('situation', ChoiceType::class, [
                'choices'  => [
                    'Etudiant' => "etudiant",
                    'Empolyer' => "empolyer",
                    'Autre' => "autre",
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
