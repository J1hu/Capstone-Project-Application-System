<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PerksCard extends Component
{
    public $edits;
    public $title;
    public $desc;

    public function __construct($edits, $title, $desc)
    {
        $this->edits = $edits;
        $this->title = $title;
        $this->desc = $desc;
    }
    public function render()
    {
        return view('components.perks-card');
    }
}
