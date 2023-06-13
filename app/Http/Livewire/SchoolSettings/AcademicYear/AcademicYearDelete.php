<?php

namespace App\Http\Livewire\SchoolSettings\AcademicYear;

use Livewire\Component;

class AcademicYearDelete extends Component
{
    public $academic_year;
    public $openModal=false;


    public function openModalToDelete()
    {
        $this->openModal= true;
    }


    public function delete()
    {
        $this->academic_year->delete();

        $this->emitUp('deleted');
        $this->reset();

        toastr()->warning(trans('alert.deleted-success'), trans('alert.success'), ['timeOut' => 3000]);

    }


    public function render()
    {
        return view('livewire.school-settings.academic-year.academic-year-delete');
    }
}
