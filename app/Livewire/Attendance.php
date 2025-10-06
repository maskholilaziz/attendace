<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Schedule;

class Attendance extends Component
{
    public $latitude;
    public $longitude;
    public $isInRadius = false;

    public function render()
    {
        $schedule = Schedule::where('user_id', auth()->user()->id)->first();
        return view('livewire.attendance', [
            'schedule' => $schedule,
            'isInRadius' => $this->isInRadius
        ]);
    }
}
