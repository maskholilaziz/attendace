<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'schedule_latitude',
        'schedule_longitude',
        'schedule_start_time',
        'schedule_end_time',
        'start_latitude',
        'start_longitude',
        'end_latitude',
        'end_longitude',
        'start_time',
        'end_time',
    ];

    /**
     * Get the user that owns the Attendance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function isLate()
    {
        $scheduleStartTime = Carbon::parse($this->schedule_start_time);
        $startTime = Carbon::parse($this->start_time);

        return $startTime->gt($scheduleStartTime);
    }

    function workDuration()
    {
        $startTime = Carbon::parse($this->start_time);
        $endTime = Carbon::parse($this->end_time);

        $duration = $endTime->diff($startTime);

        $hours = $duration->h;
        $minutes = $duration->i;

        return $hours . ' jam ' . $minutes . ' menit';
    }
}
