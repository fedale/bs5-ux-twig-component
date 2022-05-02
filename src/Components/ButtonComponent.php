<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('button')]
class ButtonComponent 
{
    /**
     * @var string
     */
    public string $id; 

    /**
     * @var string
     */
    public string $type;

    /**
     * @var string
     */
    public string $tag;

    /**
     * @var string
     */
    public string $tagButton;

    /**
     * @var string
     */
    public string $content;

    /**
     * @var string
     */
    public string $text;

    /**
     * @var string
     */
    public $href;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults([
            'id' => 'button-' . \uniqid(),
            'type' => 'primary',
            'tag' => 'button',
            'tagButton' => 'button',
            'content' => 'my content',
            'text' => 'dark',
            'href' => '#'
        ]);

        $resolver->setAllowedTypes('href', ['string']); // It does not work in any combination

        $resolver->setAllowedValues('type', ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'link']);
        $resolver->setAllowedValues('tag', ['link', 'button', 'input', 'submit', 'reset']);
        $resolver->setAllowedValues('text', ['light', 'dark', '']);

        $resolver->setNormalizer('type', function(Options $options, $value) {
            return 'btn-' . $value;
        });
        
        $resolver->setNormalizer('tagButton', function(Options $options, $value) {
            $tag = $options['tag'];

            switch ($tag) {
                case 'link':
                    $value = 'a';
                    break;
                case 'button':
                case 'submit':
                case 'reset':
                    $value = 'input';
                    break;
                case 'button':
                default:
                    $value = 'button';
                    break;
            }

            return $value;
        });
        $resolver->setNormalizer('text', function(Options $options, $value) {
            return 'text-' . $value;
        });
        

        return $resolver->resolve($data);
    }
}