<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class Calendar extends Component
{
    public $events = '';

    public function getevent()
    {
        $events = Event::select('id','title','start','end')->get();

        return  json_encode($events);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        $input['end'] = $event['end'];
        Event::create($input);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function eventDrop($event, $oldEvent)
    {
        $eventdata = Event::find($event['id']);
        $eventdata->start = $event['start'];
        $eventdata->save();
    }

    public function deleteEvent($id)
    {
        $eventdata = Event::find($id);
        $eventdata->delete();

    }

    public function render()
    {
        $this->dispatchBrowserEvent('livewire:load');
        $events = Event::select('id','title','start','end')->get();

        $this->events = json_encode($events);

        return view('livewire.calendar');
    }
}
