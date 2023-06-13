<?php

namespace App\Http\Livewire\SchoolSettings\AcademicYear;

use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;

class AcademicYearTable extends Component
{
    use WithPagination;

    public $search;
    public $listeners = ['created'=>'$refresh','deleted'=>'$refresh','edited'=>'$refresh'];


    public function render()
    {
        $academic_year_Query = AcademicYear::query();
        if ($this->search) {
            $academic_year_Query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('term','like','%'.$this->search.'%')
                ->orWhere('description','like','%'.$this->search.'%');
            });
        }
        $academic_years= $academic_year_Query->paginate(10);
        return view('livewire.school-settings.academic-year.academic-year-table',compact('academic_years'));
    }
}
