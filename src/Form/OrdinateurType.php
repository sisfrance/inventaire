<?php

namespace App\Form;

use App\Entity\Ordinateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextAreaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class OrdinateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->setAction("/base/save")
            ->add('reference')
            ->add('serial_number')
            ->add('memoire')
            ->add('date_achat')
            ->add('adresse_ip')
            ->add('notes')
            ->add('nom')
            ->add('modele')
            ->add('type_ordinateur')
            ->add('processeur')
            ->add('fournisseur')
            ->add('systeme')
            ->add('peripheriques')
            ->add('utilisateurs')
            ->add('emplacement')
            ->add('Enregistrer',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ordinateur::class,
            'attr'=>['class'=>'form-group-inline'],
            'allow_extra_fields'=>true,
        ]);
    }
}
