<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LinkCard extends Component
{
    public string $title;
    public string $href;
    public string $image;
    public bool $openNewTab;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $href, string $image = null, bool $openNewTab)
    {
        $this->title = $title;
        $this->href = $href;
        $this->image = $image;
        $this->openNewTab = $openNewTab;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.link-card');
    }
}
