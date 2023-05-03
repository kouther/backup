<?php

namespace App\Form;

use App\Entity\Cursus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CursusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bacdate')
            ->add('bacmention')
            ->add('bacsection')
            ->add('bacsession')
            ->add('diplome')
            ->add('etablissement')
            ->add('anneeunivesitaire')
            ->add('domaine')
            ->add('specialite')
            ->add('redoublement')
            ->add('bacmoyenne')
            ->add('anneeun')
            ->add('Mentionun')
            ->add('moyenun')
            ->add('ratrappageun')
            ->add('anneedeux')
            ->add('Mentiondeux')
            ->add('moyendeux')
            ->add('ratrappagedeux')
            ->add('anneetrois')
            ->add('mentiontrois')
            ->add('moyentrois')
            ->add('ratrappagetrois')
            ->add('scoreDossier')
            ->add('scoreEtablissement')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cursus::class,
        ]);
    }
}
