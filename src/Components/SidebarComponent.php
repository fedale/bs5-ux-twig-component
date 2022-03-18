<?php

namespace App\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('sidebar')]
class SidebarComponent 
{

    public $components = [];

    
 public function __construct() {
    $this->components = [
        ['id' => 'accordion', 'name' => 'Accordion'],
        ['id' => 'alert', 'name' => 'Alert'],
        ['id' => 'badge', 'name' => 'Badge'],
        ['id' => 'breadcrumb', 'name' => 'Breadcrumb'],
        ['id' => 'button', 'name' => 'Button'],
        ['id' => 'button_group', 'name' => 'Button group'],
        ['id' => 'card', 'name' => 'Card'],
        ['id' => 'carousel', 'name' => 'Carousel'],
        ['id' => 'close_button', 'name' => 'Close button'],
        ['id' => 'collapse', 'name' => 'Collapse'],
        ['id' => 'dropdown', 'name' => 'Dropdown'],
        ['id' => 'list_group', 'name' => 'List_group'],
        ['id' => 'modal', 'name' => 'Modal'],
        ['id' => 'nav_tab', 'name' => 'Navs & tabs'],
        ['id' => 'navbar', 'name' => 'Navbar'],
        ['id' => 'offcanva', 'name' => 'offcanvas'],
        ['id' => 'pagination', 'name' => 'Pagination'],
        ['id' => 'popover', 'name' => 'Popover'],
        ['id' => 'progress', 'name' => 'Progress'],
        ['id' => 'scrollspy', 'name' => 'Scrollspy'],
        ['id' => 'spinner', 'name' => 'Spinner'],
        ['id' => 'toast', 'name' => 'Toast'],
        ['id' => 'tooltip', 'name' => 'Tooltip']
    ];
 }

}