<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('button_group')]
class ButtonGroupComponent 
{
    public $options = [];

    public array $items = [];

    public string $direction;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
/*        $resolver->setDefault('items', function (OptionsResolver $itemsResolver) {
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
                    'role' => null,
                    'raw' => true
                ])
                ->setAllowedTypes('active', 'bool')
                ->setAllowedTypes('disabled', 'bool')
                ->setAllowedTypes('id', ['null', 'string'])
                ->setAllowedTypes('role', ['null', 'string'])
                ->setAllowedTypes('toggle',  ['null', 'string'])
            ;
        });
*/
        $resolver->setRequired('items');
        $resolver->setDefault('direction', '');
        $resolver->setDefault('options', function (OptionsResolver $optionsResolver) {
            $optionsResolver
                ->setDefaults([
                    'id' => 'button-group-' . \uniqid(),
                    'containerTag' => 'div',
                    'innerTag' => 'a',
                    'flush' => false,
                    'numbered' => false,
                    'class' => 'btn-group',
                    'class-item' => 'list-group-item',
                    'role' => null
                ])
                ->setAllowedTypes('role', ['null', 'string'])
            ;
        });

        return $resolver->resolve($data);
    }
    
    
}