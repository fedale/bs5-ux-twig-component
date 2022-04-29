<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('list_group')]
class ListGroupComponent 
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
                ->setRequired(['content'])
                ->setDefaults([
                    'id' => null, 
                    'class' => 'list-group-item', 
                    'active' => false, 
                    'disabled' => false, 
                    'url' => '#',
                    'toggle' => null,
                    'role' => null
                ])
                ->setAllowedTypes('active', 'bool')
                ->setAllowedTypes('disabled', 'bool')
                ->setAllowedTypes('id', ['null', 'string'])
                ->setAllowedTypes('role', ['null', 'string'])
                ->setAllowedTypes('toggle',  ['null', 'string'])
            ;
        });

        $resolver->setDefault('options', function (OptionsResolver $optionsResolver) {
            $optionsResolver
                ->setDefaults([
                    'id' => 'list-group-' . \uniqid(),
                    'containerTag' => 'div',
                    'innerTag' => 'a',
                    'flush' => false,
                    'numbered' => false,
                    'class' => 'list-group',
                    'class-item' => 'list-group-item',
                    'role' => null
                ])
                ->setAllowedTypes('role', ['null', 'string'])
            ;
        });

        return $resolver->resolve($data);
    }
    
    
}