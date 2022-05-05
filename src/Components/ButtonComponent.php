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
    public string $tagType;
    
    /**
     * @var string
     */
    public string $tagName;
    
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

    /**
     * @var bool
     */
    public string $outline;

    /**
     * @var string
     */
    public string $size;

    /**
     * @var bool|string
     */
    public $disabled;

    /**
     * @var bool
     */
    public $raw;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults([
            'id' => 'button-' . \uniqid(),
            'type' => 'primary',
            'content' => 'my content',
            'text' => 'light',
            'href' => '#',
            'tag' => 'button',
            'outline' => false,
            'size' => '',
            'disabled' => false,
            'raw' => true
        ]);
        
        $resolver->setDefault('tagType', function (Options $options) {
            $tag = $options['tag'];

            switch ($tag) {
                
                case 'submit':    
                    $value = 'submit';
                    break;                
                case 'input':
                    $value = 'button';
                    break;
                case 'reset':
                    $value = 'reset';
                    break;
                case 'button':
                case 'link':
                default:
                    $value = '';
                    break;
            }

            return $value;
            }
        );

        $resolver->setDefault('tagName', function (Options $options) {
            $tag = $options['tag'];

            switch ($tag) {
                case 'link':
                    $value = 'a';
                    break;
                case 'submit':
                case 'input':
                case 'reset':
                    $value = 'input';
                    break;                
                case 'button':
                default:
                    $value = 'button';
                    break;
            }
            
            return $value;
            }
        );

        $resolver->setAllowedTypes('href', ['string']); 
        $resolver->setAllowedTypes('disabled', 'bool'); 

        $resolver->setAllowedValues('type', ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'link']);
        $resolver->setAllowedValues('tag', ['link', 'button', 'input', 'submit', 'reset']);
        $resolver->setAllowedValues('text', ['light', 'dark', '']);
        $resolver->setAllowedValues('size', ['lg', 'sm', '']);

        $resolver->setNormalizer('type', function(Options $options, $value) {
            if ( $options['outline']) {
                return 'btn-outline-' . $value;    
            }

            return 'btn-' . $value;
        });
        
        $resolver->setNormalizer('text', function(Options $options, $value) {
            return 'text-' . $value;
        });

        $resolver->setNormalizer('size', function(Options $options, $value) {
            return 'btn-' . $value;
        });

        $resolver->setNormalizer('disabled', function(Options $options, $value) {
            return $value ? 'disabled' : '';
       });
        
        return $resolver->resolve($data);
    }
}