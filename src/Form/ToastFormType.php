<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ToastFormType extends AbstractType
{
    public string $type;

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', 
                ChoiceType::class, 
                [
                    'label' => 'Type',
                    'choices' => $options['types'],
                    'data' => $options['defaultType']
                ]
            )
            ->add('title', 
                TextType::class, 
                [
                    'label' => 'Titolo',
                    'data' => $options['defaultTitle']
                ]
            )
            ->add('message', 
            TextareaType::class, 
            [
                'label' => 'Message',
                'data' => $options['defaultMessage']
            ])
            ->add('Submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'title' => 'My default title',
            'types' => ['primary' => 'primary', 'secondary' => 'secondary', 'success' => 'success', 'danger' => 'danger', 'warning' => 'warning', 'info' => 'info', 'light' => 'light', 'dark' => 'dark', 'link' => 'link'],
            'defaultType' => 'success',
            'defaultTitle' => 'A title...',
            'defaultMessage' => 'This is a message!'
        ]);

        // $resolver->setAllowedValues('type', ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'link']);
    }
}
