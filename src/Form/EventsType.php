<?php

namespace App\Form;

use App\Entity\Events;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class EventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['class' => 'form-control  mt-2 w-50',  'maxlength' => '200','required' => true] , 
                'label' => 'Name'
            ])
            ->add('date', null , [
                'attr' => ['class' => 'form-control mt-2 ', 'required' => true ] , 
                'widget' => 'single_text'
            ])
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'form-control mt-2 w-50', 'required' => true]
            ])
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'form-control mt-2 w-50',  'maxlength' => '150','required' => true]
            ])
            ->add('image', FileType::class, [
                'attr' => ['class' => 'form-control mt-2 w-50' ] ,
                'label' => 'Upload Picture',
 //unmapped means that is not associated to any entity property
                'mapped' => false,
 //not mandatory to have a file
                'required' => false,
 
 //in the associated entity, so you can use the PHP constraint classes as validators
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image file (it could be empty)',
                    ])
                ],
            ])
            ->add('capacity', NumberType::class, [
                'attr' => ['class' => 'form-control mt-2 w-50' , 'maxlength' => '8', 'required' => true]
            ])
            ->add('phone_number', TextType::class, [
                'attr' => ['class' => 'form-control mt-2 w-50' , 'maxlength' => '20', 'required' => true]
            ])
            ->add('url', TextType::class, [
                'attr' => ['class' => 'form-control mt-2 w-50' , 'maxlength' => '150', 'required' => true]
            ])
            ->add('type', ChoiceType::class, [
                'attr' => ['class' => 'form-control mt-2 w-50'] ,
                'choices' => ['Music' => 'music', 'Sport' => 'sport', 'Movie' => 'movie','Theater' => 'theater' ,'Ect.' => 'other' ]
                
            ])
            ->add('street_name', TextType::class, [
                'attr' => ['class' => 'form-control mt-2 w-50' , 'maxlength' => '50', 'required' => true]
            ])
            ->add('number', TextType::class, [
                'attr' => ['class' => 'form-control mt-2 w-50' , 'maxlength' => '5', 'required' => true]
            ])
            ->add('zip_code', TextType::class, [
                'attr' => ['class' => 'form-control mt-2 w-50' , 'maxlength' => '10', 'required' => true]
            ])
            ->add('city_name', TextType::class, [
                'attr' => ['class' => 'form-control mt-2 mb-3 w-50' , 'maxlength' => '50', 'required' => true]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Events::class,
        ]);
    }
}
