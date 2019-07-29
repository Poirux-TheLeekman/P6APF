<?php

namespace App\Form;

use App\Entity\Entry;
use App\Entity\Category;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class EntryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name',TextType::class,['label'=> 'nom :'])
        ->add('description',TextareaType::class,['required'=>false, 'label'=> 'Informations :'])
            ->add('mail',EmailType::class,['required'=>false, 'label'=> 'Adresse mail :'])
            ->add('phone', PhoneType::class,['required'=>false, 'label'=> 'Téléphone :'])
            ->add('fax', PhoneType::class,['required'=>false, 'label'=>'Fax :'])
            ->add('website',UrlType::class,['required'=>false, 'label'=>'Site Web :'])
            ->add('logo',UrlType::class,['required'=>false, 'label'=>'Logo/image :'])
            ->add('publish',HiddenType::class,['data'=>0, 'label'=>'Logo/image :'])
            ->add('PmrAccess',CheckboxType::class,['label'=> 'Accessibilité PMR','required'=>false])
            ->add('categories',EntityType::class,[
                'class'=>Category::class,
                'choice_label'=>'name',
                'multiple' =>true,
                'expanded' => true,
                'required'=>false,
            ])
            ->add('lat',HiddenType::class)
            ->add('lng',HiddenType::class)
            ->add('address', TextType::class,[
                'label'=>'ou une adresse complete puis cliquer sur Rechercher'])
            
            ;
       
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entry::class,
        ]);
    }
}
