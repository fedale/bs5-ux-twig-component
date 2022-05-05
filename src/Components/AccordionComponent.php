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
            $itemsResolver
                ->setPrototype(true)
                ->setRequired(['label', 'content'])
                ->setDefaults(['alwaysOpen' => false, 'show' => false, 'raw' => true])
                ->setAllowedTypes('alwaysOpen', 'bool')
                ->setAllowedTypes('show', 'bool')
            ;
        });

        $resolver->setDefault('options', function (OptionsResolver $optionsResolver) {
            $optionsResolver->setDefaults([
                'id' => $this->getId(),
                'flush' => false,
                'class' => 'accordion',
                'class-item' => 'accordion-item',
                'class-header' => 'accordion-header',
                'class-button' => 'accordion-button',
                'class-body' => 'accordion-body'
            ]);
        });

        return $resolver->resolve($data);
    }

    private function getId(): string
    {
        return 'accordion-' . \uniqid();
    }
}