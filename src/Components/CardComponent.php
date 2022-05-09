<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('card')]
class CardComponent 
{
    public string $id; 

    /**
     * @var string|bool the card header, if there is one
     */
    public $header;

    /**
     * @var string the card body
     */
    public $content;

    /**
     * @var string|bool the card footer, if there is one
     */
    public $footer;
    
    /**
     * @var string|bool the content rendered before body, if any
     */
    public $beforeContent;

    /**
     * @var string|bool the content rendered after body, if any
     */
    public $afterContent;

    public $raw = true;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults([
            'id' => 'badge-' . \uniqid(),
            'content' => 'my content',
            'header' => false,
            'footer' => false,
            'beforeContent' => false,
            'afterContent' => false,
        ]);

        // $resolver->setNormalizer('pill', function(Options $options, $value) {
        //      return $value ? 'rounded-pill' : '';
        // });

        return $resolver->resolve($data);
    }
}