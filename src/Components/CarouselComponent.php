<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('carousel')]
class CarouselComponent 
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
                ->setDefaults(['alwaysOpen' => false, 'show' => false, 'raw' => true, 'caption' => false, 'interval' => false])
                ->setAllowedTypes('alwaysOpen', 'bool')
                ->setAllowedTypes('show', 'bool')
                ->setDefined('interval', 'string')
            ;
        });

        $resolver->setDefault('options', function (OptionsResolver $optionsResolver) {
            $optionsResolver->setDefaults([
                'id' => $this->getId(),
                'active' => false,
                'class' => 'carousel slide',
                'class-item' => 'carousel-item',
                'controls' => false,
                'indicators' => false,
                'fade' => false,
            ]);
        });

        return $resolver->resolve($data);
    }

    private function getId(): string
    {
        return 'carousel-' . \uniqid();
    }
}