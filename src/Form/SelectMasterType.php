<?php

namespace App\Form;

use App\Entity\Master;
use App\Entity\University;
use App\Entity\SelectMaster;
use app\Repository\UniversityRepository;
use App\Repository\MastersRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class SelectMasterType extends AbstractType
{

    public function __construct(public MastersRepository $masterRepository){}

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('user')
        ->add('university', EntityType::class, [
            'class' => University::class,
            'choice_label' => 'Etablissement ',
            'placeholder' => 'Choose an university',
            'query_builder' => fn (UniversityRepository $universityRepository) =>
            $universityRepository->findAllOrderedByAscNameQueryBuilder()
        ]);
        $formModifier = function (FormInterface $form, University $university = null) {
            $master = $university === null ? [] : $this->masterRepository->findByUniversityOrderedByAscName($university);
            $form->add('master', EntityType::class, [
                'class' => Master::class,
                'choice_label' => 'Master',
                'disabled' => $university === null,
                'placeholder' => 'Choose a master',
                'choices' => $master
            ]);
        };
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getId());
            }
        );

        $builder->get('university')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $university = $event->getForm()->getData();

                $formModifier($event->getForm()->getParent(), $university);
            }
        );
     
      
      
        

        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SelectMaster::class,
        ]);
    }
}
