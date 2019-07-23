<?php

namespace App\Form;



use App\Entity\Searchproperties;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Category;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;




class SearchpropertiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('publish',ChoiceType::class,[
            'label'=>'Filtrer les fiches :',
            'required'=>false,
            'placeholder'=>'toutes',
            'choices'  => [
                'publiées' => true,
                'non-publiées' => false,
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Searchproperties::class,
        ]);
    }
}
