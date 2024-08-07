<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataGrid extends Component
{
    public $headers = [];
    public $tableId;
    public function __construct($tableId, $headings)
    {
        $this->tableId = $tableId;
        $this->headers = $headings;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-grid');
    }
}
