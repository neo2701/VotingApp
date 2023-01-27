<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ElectionLayout extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('election.layouts.election');
    }
}
