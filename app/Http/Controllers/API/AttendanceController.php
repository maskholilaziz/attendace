<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function getAttendanceToday()
    {
        $userId = auth()->user()->id;
        $today = now()->toDateString();
        $currentMonth = now()->month;

        $attendanceToday = Attendance::select('start_time', 'end_time')
            ->where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->first();

        $attendanceThisMonth = Attendance::select('start_time', 'end_time', 'created_at')
            ->where('user_id', $userId)
            ->whereMonth('created_at', $currentMonth)
            ->get()
            ->map(function ($attendance) {
                return [
                    'start_time' => $attendance->start_time,
                    'end_time' => $attendance->end_time,
                    'date' => $attendance->created_at->toDateString(),
                ];
            });

        return response()->json([
            'success' => true,
            'data' => [
                'today' => $attendanceToday,
                'this_month' => $attendanceThisMonth
            ],
            'message' => 'Success get attendance today'
        ]);
    }

    public function getSchedule()
    {
        $schedule = Schedule::with(['office', 'shift'])
            ->where('user_id', auth()->user()->id)
            ->first();

        return response()->json([
            'success' => true,
            'data' => $schedule,
            'message' => 'Success get schedule'
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->only(['latitude', 'longitude']);

        $validator = Validator::make($payload, [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors(),
                'message' => 'Validation Error',
            ], 422);
        }

        $userId = auth()->id();
        $schedule = Schedule::where('user_id', $userId)->first();

        if (!$schedule) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'Schedule Not Found',
            ]);
        }

        $today = now()->toDateString();
        $attendance = Attendance::where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->first();
        $timestamp = now()->toTimeString();

        if (!$attendance) {
            $attendance = Attendance::create([
                'user_id' => $userId,
                'schedule_latitude' => $schedule->office->latitude,
                'schedule_longitude' => $schedule->office->longitude,
                'schedule_start_time' => $schedule->shift->start_time,
                'schedule_end_time' => $schedule->shift->end_time,
                'start_latitude' => $payload['latitude'],
                'start_longitude' => $payload['longitude'],
                'start_time' => $timestamp,
                'end_time' => $timestamp,
            ]);
        } else {
            $attendance->update([
                'end_latitude' => $payload['latitude'],
                'end_longitude' => $payload['longitude'],
                'end_time' => $timestamp,
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $attendance,
            'message' => 'Success store attendance',
        ]);
    }

    function getAttendanceByMonthYear($month, $year)
    {
        $validator = Validator::make([
            'month' => $month,
            'year' => $year,
        ], [
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|min:2025|max:' . date('Y'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors(),
                'message' => 'Validation Error',
            ], 422);
        }

        $userId = auth()->id();
        $attendanceList = Attendance::select('start_time', 'end_time', 'created_at')
            ->where('user_id', $userId)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get()
            ->map(function ($attendance) {
                return [
                    'start_time' => $attendance->start_time,
                    'end_time' => $attendance->end_time,
                    'date' => $attendance->created_at->toDateString(),
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $attendanceList,
            'message' => 'Success get attendance by month and year',
        ]);
    }
}
