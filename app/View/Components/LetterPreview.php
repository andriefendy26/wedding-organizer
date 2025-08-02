<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LetterPreview extends Component
{
    public $letter;

    /**
     * Create a new component instance.
     */
    public function __construct($letter = null)
    {
        $this->letter = $letter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('filament.components.letter-preview');
    }
}
