<?php

namespace App\View\Components\DashboardSchedule;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardWithAction extends Component
{
    public $scheduleOfSubject;

    public function __construct($scheduleOfSubject)
    {
        $this->scheduleOfSubject = $scheduleOfSubject;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-schedule.card-with-action');
    }
}
