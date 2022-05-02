<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('badge')]
class BadgeComponent 
{
    public string $id; 

    public string $type;

    public string $content;

    public string $text;

    /**
     * @var bool|string
     */
    public $pill;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults([
            'id' => 'badge-' . \uniqid(),
            'type' => 'primary',
            'content' => 'my content',
            'text' => 'dark',
            'pill' => false
        ]);

        $resolver->setAllowedTypes('pill', ['bool', 'string']); // It does not work in any combination

        $resolver->setAllowedValues('type', ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark']);
        $resolver->setAllowedValues('text', ['light', 'dark']);

        $resolver->setNormalizer('type', function(Options $options, $value) {
            return 'bg-' . $value;
        });
        $resolver->setNormalizer('text', function(Options $options, $value) {
            return 'text-' . $value;
        });
        $resolver->setNormalizer('pill', function(Options $options, $value) {
             return $value ? 'rounded-pill' : '';
        });

        dump($resolver->resolve($data)); // returned values are good, if pill is true is transformed in string
        return $resolver->resolve($data);
    }
}