<?php

namespace App\View\Components;

use App\Models\MegaMenuItem;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MegaMenu extends Component
{
    public $menuItems;
    public $categories;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menuItems = MegaMenuItem::active()->ordered()->get();
        $this->categories = $this->menuItems->pluck('category')->unique()->filter();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mega-menu', [
            'menuItems' => $this->menuItems,
            'categories' => $this->categories,
        ]);
    }
}
