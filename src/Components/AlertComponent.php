<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('alert')]
class AlertComponent 
{
    public string $id; 

    public string $type;

    public string $content;

    public bool $dismiss;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults([
            'id' => 'alert-' . \uniqid(),
            'type' => 'default',
            'content' => 'my content',
            'dismiss' => false,
        ]);

        return $resolver->resolve($data);
    }
    
    
}