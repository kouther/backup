<?php

namespace App\Form;

use App\Entity\Upload;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class UploadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Cin', TextType::class)
            ->add('transcriptun', TextType::class)
            ->add('transcriptdeux', TextType::class)
            ->add('transcripttrois', TextType::class)
            ->add('bac', TextType::class)
            ->add('user')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Upload::class,
        ]);
    }
}
