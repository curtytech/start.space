<?php

namespace App\View\Components;

use App\Models\MegaMenuItem;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User;

class MegaMenu extends Component
{
    public $menuItems;
    public $categories;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $userId = auth()->id()
            ?? User::where('role', 'admin')->value('id')
            ?? User::value('id');

        $query = MegaMenuItem::active()->ordered();

        if ($userId) {
            $query->where('user_id', $userId);
        }

        $this->menuItems = $query->get();
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
