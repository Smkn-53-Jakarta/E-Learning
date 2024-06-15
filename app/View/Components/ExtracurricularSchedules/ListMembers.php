<?php

namespace App\View\Components\ExtracurricularSchedules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListMembers extends Component
{
    public $members;

    public function __construct($members)
    {
        $this->members = $members;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $myId = auth()->user()->id;
        $thereIsMe = $this->members->find($myId);
        $limitUsers = $thereIsMe ? 2 : 3;
        $limitMember = $this->members->where('student_id', '!=', $myId)->take($limitUsers);
        $overMembers = $this->members->where('student_id', '!=', $myId)->count() - $limitUsers;
        $members = $this->members->where('student_id', '!=', $myId);

        return view('components.extracurricular-schedules.list-members', compact('thereIsMe', 'limitMember', 'members', 'overMembers'));
    }
}
