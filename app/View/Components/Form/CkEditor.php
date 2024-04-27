<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CkEditor extends Component
{
    public $value;
    public $name;
    public $id;

    public function __construct($name = 'description', $id = 'ck-editor', $value = '')
    {
        $this->value = $value;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.ck-editor');
    }
}
