<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use MacsiDigital\Zoom\Facades\Zoom;

trait MeetingZoomTrait
{
    public function createMeeting($request)
    {
        $user = Zoom::user()->first();

        $startDateTime = Carbon::parse($request->start_time); // Parse the input date with Carbon
        $zoomTimezone = config('services.zoom.timezone');

        $meetingData = [
            'topic' => $request->topic,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_time' => $startDateTime->format('Y-m-d\TH:i:s'), // Format the date for Zoom API
            'timezone' => $zoomTimezone
        ];

        $meeting = Zoom::meeting()->make($meetingData);

        $meeting->settings()->make([
            'join_before_host' => false,
            'host_video' => false,
            'participant_video' => false,
            'mute_upon_entry' => true,
            'waiting_room' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'auto_recording' => config('zoom.auto_recording')
        ]);

        return $user->meetings()->save($meeting);
    }
}

