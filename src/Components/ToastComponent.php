<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('toast')]
class ToastComponent 
{
    const TYPE_SUCCESS = 'success';
        const TYPE_ERROR = 'error';
        const TYPE_WARNING = 'warning';
        const TYPE_INFO = 'info';
        
        const POSITION_TOP_RIGHT = 'toast-top-right';
        const POSITION_TOP_LEFT = 'toast-top-left';
        const POSITION_TOP_CENTER = 'toast-top-center';
        const POSITION_TOP_FULL_WIDTH = 'toast-top-full-width';
        
        const POSITION_BOTTOM_RIGHT = 'toast-bottom-right';
        const POSITION_BOTTOM_LEFT = 'toast-bottom-left';
        const POSITION_BOTTOM_CENTER = 'toast-bottom-center';
        const POSITION_BOTTOM_FULL_WIDTH = 'toast-bottom-full-width';
        
        /** @var string $title */
        public $title;
        /** @var string $message */
        public $message;
        /** @var string $message */
        public $messageDefault = 'Hello, This is default message.';
        /** @var string $type */
        public $type;
        /** @var array $types */
        public $types = ['success', 'error', 'warning', 'info'];
        /** @var string $typeDefault */
        public $typeDefault = self::TYPE_SUCCESS;
        /** @var array $options */
        public $options = [];

        public string $id; 

        public bool $raw;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults([
            'id' => 'toast-' . \uniqid(),
            'type' => 'default',
            'message' => 'my message',
            'raw' => true,
        ]);

        return $resolver->resolve($data);
    }
    
    
}