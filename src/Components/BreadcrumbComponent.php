<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('breadcrumb')]
class BreadcrumbComponent 
{
     /**
     * @var string the name of the breadcrumb container tag.
     */
    public $tag = 'nav';

    /**
     * @var array the HTML attributes for the breadcrumb container tag.
     */
    public $options; // = ['class' => 'breadcrumb'];
    
    /**
     * @var bool whether to HTML-encode the link labels.
     */
    public $encodeLabels = true;
    
    
    
    /**
     * @var array list of links to appear in the breadcrumbs. If this property is empty,
     * the widget will not render anything. Each array element represents a single link in the breadcrumbs
     * with the following structure:
     *
     * ```php
     * [
     *     'label' => 'label of the link',  // required
     *     'url' => 'url of the link',      // optional
     *     'template' => 'own template of the item', // optional, if not set $this->itemTemplate will be used
     *     'active' => 'true|false', // optional, if link is active or not
     *     'class' => 'external', // optional, css classes
     * ]
     * ```
     * Note that first item is intended as home link. 
     */
    public $items = [];

    /**
     * @var string the string used as divider between breadcrumb items
     */
    public $divider = '>';


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
                    'class' => 'breadcrumb-item', 
                    'active' => false, 
                    'visible' => true, 
                    'url' => '#',
                    'raw' => true
                ])
                ->setAllowedTypes('active', 'bool')
                ->setAllowedTypes('visible', 'bool')
                ->setAllowedTypes('id', ['null', 'string'])
            ;
        });

        $resolver->setDefault('options', function (OptionsResolver $optionsResolver) {
            $optionsResolver
                ->setDefaults([
                    'id' => 'breadcrumb-' . \uniqid(),
                    'containerTag' => 'ol',
                    'innerTag' => 'li',
                    'class' => 'breadcrumb',
                    'class-item' => '',
                    'role' => null
                ])
                ->setAllowedTypes('role', ['null', 'string'])
            ;
        });

        return $resolver->resolve($data);
    }
    
    
}