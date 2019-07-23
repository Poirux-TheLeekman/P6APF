<?php

namespace App\Form;

use App\Entity\Entry;
use App\Entity\Category;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('name')
            ->add('description')
            ->add('mail',EmailType::class)
            ->add('phone', TelType::class)
            ->add('fax')
            ->add('website',UrlType::class)
            ->add('logo',UrlType::class)
            ->add('publish',HiddenType::class,['data'=>0])
            ->add('categories',EntityType::class,[
                'class'=>Category::class,
                'choice_label'=>'name',
                'multiple' =>true,
                'expanded' => true,
            ])
            ->add('lat',HiddenType::class)
            ->add('lng',HiddenType::class)
            ->add('address', TextType::class,[
                'label'=>'Entrer un nom de Commune ou une adresse complete puis cliquer sur Rechercher'])
            
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
