<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GuestNavigation extends Component
{
     public $classname;
     public $login;

    public function __construct($classname, $login)
    {
        $this->classname = $classname;
        $this->login = $login;
    }

    public function render()
    {
        return view('components.guest-navigation');
    }
}
