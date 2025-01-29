<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavItem extends Component
{
    public $liClass;
    public $href;

    public function __construct($liClass = '', $href = '')
    {
        $this->liClass = $liClass;
        $this->href = $href;
    }

    public function render()
    {
        return view('components.nav-item');
    }
}
