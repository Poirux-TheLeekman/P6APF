<?php

namespace App\Form;

use App\Entity\Entry;
use App\Entity\Category;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class UserEntryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name')
        ->add('description')
        ->add('mail',EmailType::class)
        ->add('phone', TelType::class)
        ->add('fax')
        ->add('website',UrlType::class)
        ->add('logo',UrlType::class)
        ->add('publish')
        ->add('categories',EntityType::class,[
            'class'=>Category::class,
            'choice_label'=>'name',
            'multiple' =>true,
            'expanded' => true,
        ]);
       
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entry::class,
        ]);
    }
}
