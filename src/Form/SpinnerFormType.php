<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpinnerFormType extends AbstractType
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
            ->add('spinner', 
                ChoiceType::class, 
                [
                    'label' => 'Spinner Type',
                    'choices' => $options['spinnerTypes'],
                    'data' => $options['defaultSpinnerType']
                ]
            )
            ->add('size', 
                ChoiceType::class, 
                [
                    'label' => 'Size',
                    'choices' => $options['sizeTypes'],
                    'data' => $options['defaultSize']
                ]
            )
            ->add('Submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'title' => 'My default title',
            'types' => ['primary' => 'primary', 'secondary' => 'secondary', 'success' => 'success', 'danger' => 'danger', 'warning' => 'warning', 'info' => 'info', 'light' => 'light', 'dark' => 'dark', 'link' => 'link'],
            'defaultType' => 'success',
            'spinnerTypes' => ['border' => 'border', 'grow' => 'grow'],
            'defaultSpinnerType' => 'border',
            'sizeTypes' => ['Small' => 'sm', 'Normal' => 'md'],
            'defaultSize' => 'md',
        ]);

        // $resolver->setAllowedValues('type', ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'link']);
    }
}
