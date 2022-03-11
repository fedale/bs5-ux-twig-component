<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('accordion')]
class AccordionComponent 
{

    public $options = [];

    public array $items = [];

    
    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setDefault('items', function (OptionsResolver $itemsResolver) {
            $itemsResolver->setPrototype(true)
            ->setDefaults([
                'label' => 'my label',
                'content' => 'my content',
                'show' => false,
                'alwaysOpen' => false
            ]);
        });

        $resolver->setDefault('options', function (OptionsResolver $optionsResolver) {
            $optionsResolver->setDefaults([
                'id' => $this->getId(),
                'flush' => false,
                'class' => 'asda',
                'class-item' => 'accordion-item',
                'class-header' => 'accordion-header',
                'class-button' => 'accordion-button',
                'class-body' => 'accordion-body'
            ]);
        });
        /*
        $resolver->setDefault('spool', function (OptionsResolver $spoolResolver) {
            $spoolResolver->setDefaults([
                'type' => 'file',
                'path' => '/path/to/spool',
            ]);
            $spoolResolver->setAllowedValues('type', ['file', 'memory']);
            $spoolResolver->setAllowedTypes('path', 'string');
        });*/


        dump($data, $resolver->resolve($data));

        return $resolver->resolve($data);
    }

    // public function mount(array $items, array $options)
    // {
    //     dump($items, $options);
    // }


    private function getId(): string
    {
        return 'accordion-' . \uniqid();
    }
}