<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ApplicationLogo extends Component
{
    public $logo;
    public $container;
    public $title;
    public $subtitle;
    public $titlefluid;

    public function __construct($logo, $container, $title, $subtitle, $titlefluid)
    {
        $this->logo = $logo;
        $this->container = $container;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->titlefluid = $titlefluid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.application-logo');
    }
}
