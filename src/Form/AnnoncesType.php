<?php

namespace App\Form;

use App\Entity\Annonces;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AnnoncesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('numero')
            ->add('droit')
            ->add('arrestation')
            ->add('inculpation', CKEditorType::class, array(
                'config' => array('toolbar' => 'full'),
            ))
            ->add('detail', CKEditorType::class, array(
                'config' => array('toolbar' => 'full'),
            ))
            ->add('amende')
            ->add('tigGav')
            ->add('biens')
            ->add('comparution', CheckboxType::class, [
                'label'    => 'Comparution devant un magistrat ?',
                'required' => false,
            ])
            ->add('avocat')
            // On ajoute le champ "images" dans le formulaire
            // Il n'est pas lié à la base de données (mapped à false)
            ->add('images', FileType::class,[
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
            ->add('archives', CheckboxType::class, [
                'label'    => 'Archivée le casier ?',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonces::class,
        ]);
    }
}

