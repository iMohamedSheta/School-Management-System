<?php

namespace App\Http\Controllers\Meetings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\OnlineClass;
use Illuminate\Support\Str;

class OnlineClassController extends Controller
{
    //
    use MeetingZoomTrait;

    public function index()
    {
        return view('online_meetings.online_meetings');
    }
    
    public function create()
    {
        return view('online_meetings.create_meeting');
    }


    public function createOnlineClass(Request $request)
    {
        $validatedData = $request->validate([
            'topic' => 'required|string',
            'duration' => 'required|numeric',
            'description' => 'nullable',
            'start_time' => 'required',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $meeting = $this->createMeeting($request);

        OnlineClass::create([
            'meeting_id' => $meeting->id,
            'duration' => $meeting->duration,
            'password' => $meeting->password,
            'start_url' => $meeting->start_url,
            'join_url' => $meeting->join_url,
            'topic' => $validatedData['topic'],
            'start_at' => $request->start_time,
            'user_id' => auth()->user()->id,
            'grade_id' => $validatedData['grade_id'],
            'classroom_id' => $validatedData['classroom_id'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('meetings.index')->with('success', trans('alert.onlineclass-created', ['topic' => $validatedData['topic'], 'date' => $request->start_time]));
    }
}
