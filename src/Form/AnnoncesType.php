<?php

namespace App\Form;

use App\Entity\Status;
use App\Entity\Suspect;
use App\Entity\Annonces;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AnnoncesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('suspect', EntityType::class, [
            'class' => Suspect::class,
            'choice_label' => 'nom', ])
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
                'label' => 'Mettre en ligne les images',
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
            ->add('status', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'name', ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonces::class,
        ]);
    }
}

