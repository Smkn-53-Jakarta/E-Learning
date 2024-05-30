<?php

namespace App\View\Components\TeachingSchedules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardDefault extends Component
{
    public $teachingSchedule;

    public function __construct($teachingSchedule)
    {
        $this->teachingSchedule = $teachingSchedule;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.teaching-schedules.card-default');
    }
}