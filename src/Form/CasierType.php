<?php

namespace App\Form;

use App\Entity\Casier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class CasierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomSuspect')
            ->add('numero')
            ->add('citationDroit')
            ->add('gav')
            ->add('motif')
            ->add('detailFait')
            ->add('amende')
            ->add('tigGav')
            ->add('comparution')
            ->add('avocat')
            ->add('cloture')
            ->add('imageCasiers', FileType::class,[
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Casier::class,
        ]);
    }
}
