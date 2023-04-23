<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Alert extends Component
{

    public function __construct(public object $errorBag, public string $message)
    {
    }

    public function render(): View
    {
        return view('components.alerts');
    }

}
