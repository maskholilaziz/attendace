<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Schedule;

class Attendance extends Component
{
    public function render()
    {
        $schedule = Schedule::where('user_id', auth()->user()->id)->first();
        return view('livewire.attendance', ['schedule' => $schedule]);
    }
}
