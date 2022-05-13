<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('pagination')]
class PaginationComponent 
{
// Look at this for inspiration  https://www.yiiframework.com/extension/yiisoft/yii2-bootstrap4/doc/api/2.0/yii-bootstrap4-linkpager
    public $options = [];

    public array $items = [];

    /**
     * @var string|bool the label for the "next" page button. Note that this will NOT be HTML-encoded.
     * If this property is false, the "next" page button will not be displayed.
     */
    public $nextPageLabel = '&raquo;';
    /**
     * @var string|bool the text label for the "previous" page button. Note that this will NOT be HTML-encoded.
     * If this property is false, the "previous" page button will not be displayed.
     */
    public $prevPageLabel = '&laquo;';
    /**
     * @var string|bool the text label for the "first" page button. Note that this will NOT be HTML-encoded.
     * If it's specified as true, page number will be used as label.
     * Default is false that means the "first" page button will not be displayed.
     */
    public $firstPageLabel = false;
    /**
     * @var string|bool the text label for the "last" page button. Note that this will NOT be HTML-encoded.
     * If it's specified as true, page number will be used as label.
     * Default is false that means the "last" page button will not be displayed.
     */
    public $lastPageLabel = false;
    
    /**
     * @var string
     */
    public $size;

    /**
     * @var string
     */
    public $alignment;

    /**
     * @var int maximum number of page buttons that can be displayed. Defaults to 10.
     */
    public $maxButtonCount = 10;

    /**
     * @var bool Hide widget when only one page exist.
     */
    public $hideOnSinglePage = true;
    /**
     * @var bool whether to render current page button as disabled.
     */
    public $disableCurrentPageButton = false;

    
    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setDefault('items', function (OptionsResolver $itemsResolver) {
            $itemsResolver
                ->setPrototype(true)
                ->setRequired(['label'])
                ->setDefaults(['show' => false, 'raw' => true])
                ->setAllowedTypes('show', 'bool')
            ;
        });

        $resolver->setDefault('options', function (OptionsResolver $optionsResolver) {
            $optionsResolver->setDefaults([
                'id' => $this->getId(),
                'active' => false,
                'class' => 'carousel slide',
                'class-item' => 'page-item',
                'class-link' => 'page-link',
            ]);
        });

        $resolver->setDefined('maxButtonCount');
        $resolver->setDefined('nextPageLabel', ['bool', 'string']);
        $resolver->setDefined('prevPageLabel', ['bool', 'string']);
        $resolver->setDefined('firstPageLabel', ['bool', 'string']);
        $resolver->setDefined('lastPageLabel', ['bool', 'string']);

        $resolver->setDefault('size', 'md');
        $resolver->setDefault('alignment', 'start');

        $resolver->setAllowedValues('size', ['md', 'sm', 'lg']);
        $resolver->setAllowedValues('alignment', ['start', 'end', 'center', 'between', 'around', 'evenly']);

        $resolver->setNormalizer('size', function(Options $options, $value) {
            return 'pagination-' . $value;
        });

        $resolver->setNormalizer('alignment', function(Options $options, $value) {
            return 'justify-content-' . $value;
        });

        return $resolver->resolve($data);
    }

    private function getId(): string
    {
        return 'carousel-' . \uniqid();
    }
}