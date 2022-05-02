<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('modal')]
class ModalComponent 
{
    public string $id; 

    public string $size;

    public string $modalTitle;
    public string $closeLabel;
    public string $okLabel;
    public string $backdrop;
    public string $keyboard;
    public string $focus;

    public bool $centered;
    public bool $scrollable;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        
        $resolver->setDefaults([
            'id' => 'modal-' . \uniqid(),
            'size' => '',
            'modalTitle' => 'Modal title',
            'closeLabel' => 'Close',
            'okLabel' => 'OK',
            'backdrop' => true,
            'keyboard' => true,
            'focus' => true,
            'ajax' => false,
            'scrollable' => true,
            'centered' => true
        ]);
        $resolver->setAllowedTypes('backdrop', ['bool', 'string']);
        $resolver->setAllowedTypes('keyboard', 'bool');
        $resolver->setAllowedTypes('focus', 'bool');
        $resolver->setAllowedTypes('ajax', 'bool');
        $resolver->setAllowedTypes('scrollable', ['bool', 'string']);
        $resolver->setAllowedTypes('centered', ['bool', 'string']);

        $resolver->setAllowedValues('size', ['', 'modal-sm', 'modal-lg', 'modal-xl']);

        $resolver->setNormalizer('backdrop', function(Options $options, $value) {
            if (is_bool($value)) {
                $value = $value ? "true" : "false";
            }

            return $value;
        });

        $resolver->setNormalizer('keyboard', function(Options $options, $value) {
            return $value = $value ? "true" : "false";
        });

        $resolver->setNormalizer('focus', function(Options $options, $value) {
            return $value = $value ? "true" : "false";
        });

        $resolver->setNormalizer('scrollable', function(Options $options, $value) {
            dump($value);
             $value = $value ? "modal-dialog-scrollable" : "";
             dump($value);
             return $value;
        });

        $resolver->setNormalizer('centered', function(Options $options, $value) {
            return $value = $value ? "modal-dialog-centered" : "";
        });

        return $resolver->resolve($data);
    }    
}