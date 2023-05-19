<?php

namespace App\Http\Livewire\OnlineMeeting;

use Livewire\Component;
use MacsiDigital\Zoom\Facades\Zoom;

class MeetingDelete extends Component
{
    public $meeting;
    public $openModal=false;


    public function openModalToDelete()
    {
        $this->openModal= true;
    }


    public function delete()
    {
        $zoomMeetingId = $this->meeting->meeting_id;

        try
        {
            $zoomMeeting= Zoom::meeting()->find($zoomMeetingId);
            $zoomMeetingDelete = $zoomMeeting->delete();
            if($zoomMeetingDelete)
            {
                $meetingDelete = $this->meeting->delete();
            }
            if ($meetingDelete && $zoomMeetingDelete)
            {
                $this->emitUp('deleted');
                $this->reset();
                toastr()->warning(trans('alert.deleted-success'), trans('alert.success'), ['timeOut' => 3000]);
            }
        }
        catch(\Exception $e)
        {
            toastr()->error(trans('alert.error'), trans('alert.error'), ['timeOut' => 3000]);
        }

    }

    public function render()
    {
        return view('livewire.online-meeting.meeting-delete');
    }
}
