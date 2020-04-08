<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActorCard extends Component
{
    public $actor;

    /**
     * Create a new component instance.
     *
     * @param $actor
     */
    public function __construct($actor)
    {
        $this->actor = $actor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.actor-card');
    }
}
