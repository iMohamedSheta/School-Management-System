<?php

namespace App\Http\Controllers\Meetings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\OnlineClass;
use MacsiDigital\Zoom\Facades\Zoom;

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



    public function deleteSelected(Request $request)
    {
        $meetingsId=array_filter(explode(',',$request->selected_ids));
        $successCount = 0;

            if (count($meetingsId) > 0) {
                foreach ($meetingsId as $meetingId) {
                    if(!empty($meetingId)){
                        $meeting = OnlineClass::findOrFail($meetingId);
                        $zoomMeetingId = $meeting->meeting_id;
                        $zoomMeeting= Zoom::meeting()->find($zoomMeetingId);
                        $zoomMeetingDelete = $zoomMeeting->delete();
                        if($zoomMeetingDelete)
                        {
                            $meetingDelete = $meeting->delete();
                        }
                        if ($meetingDelete && $zoomMeetingDelete) {
                            $successCount++;
                        }
                    }
                }
            }

            if ($successCount == count($meetingsId) && $successCount > 0 ) {
                return redirect()->back()->with('success',trans('alert.meetings_deleted'));
            }



        return redirect()->back()->with('error',trans('alert.error'));
    }



}
