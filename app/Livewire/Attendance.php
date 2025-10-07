<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Schedule;
use App\Models\Attendance as AttendanceModel;
use Carbon\Carbon;

class Attendance extends Component
{
    public $latitude;
    public $longitude;
    public $isInRadius = false;

    public function render()
    {
        $schedule = Schedule::where('user_id', auth()->user()->id)->first();
        $attendance = AttendanceModel::where('user_id', auth()->user()->id)
            ->whereDate('created_at', date('Y-m-d'))->first();
        return view('livewire.attendance', [
            'schedule' => $schedule,
            'attendance' => $attendance,
            'isInRadius' => $this->isInRadius
        ]);
    }

    public function store()
    {
        $this->validate([
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $schedule = Schedule::where('user_id', auth()->user()->id)->first();

        if ($schedule) {
            $attendace = AttendanceModel::where('user_id', auth()->user()->id)
                ->whereDate('created_at', date('Y-m-d'))->first();

            if (!$attendace) {
                $attendace = AttendanceModel::create([
                    'user_id' => auth()->user()->id,
                    'schedule_latitude' => $schedule->office->latitude,
                    'schedule_longitude' => $schedule->office->longitude,
                    'schedule_start_time' => $schedule->shift->start_time,
                    'schedule_end_time' => $schedule->shift->end_time,
                    'start_latitude' => $this->latitude,
                    'start_longitude' => $this->longitude,
                    'start_time' => Carbon::now()->toTimeString(),
                    'end_time' => Carbon::now()->toTimeString(),
                ]);
            } else {
                $attendace->update([
                    'end_latitude' => $this->latitude,
                    'end_longitude' => $this->longitude,
                    'end_time' => Carbon::now()->toTimeString(),
                ]);
            }

            return redirect()->route('attendance', [
                'schedule' => $schedule,
                'isInRadius' => false
            ]);
        }
    }
}
