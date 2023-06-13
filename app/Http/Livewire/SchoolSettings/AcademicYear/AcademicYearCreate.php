<?php

namespace App\Http\Livewire\SchoolSettings\AcademicYear;

use App\Models\AcademicYear;
use Livewire\Component;

class AcademicYearCreate extends Component
{
    public $name;
    public $description;
    public $term;
    public $start_year;
    public $end_year;
    public $openModal = false;

    public function openModalToCreate()
    {
        $this->openModal = true;
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name'=>'string|required',
            'term'=>'string|required',
            'start_year' => 'required',
            'end_year' => 'required',
            'description' => 'nullable',
        ]);

        try
        {
            if($validatedData)
            {
                $createAcademicYear = AcademicYear::create([
                    'name'=>$this->name,
                    'term'=>$this->term,
                    'start_year'=>$this->start_year,
                    'end_year'=>$this->end_year,
                    'description'=>$this->description,
                ]);

                if($createAcademicYear)
                {
                    $this->emitUp('created');
                    $this->reset();
                    toastr()->success(trans('alert.academic-year-created',['name'=>$createAcademicYear->name]), trans('alert.success'), ['timeOut' => 3000]);
                }
            }
        }
        catch(\Exception $e)
        {
            toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
        }
    }

    public function render()
    {
        return view('livewire.school-settings.academic-year.academic-year-create');
    }
}
