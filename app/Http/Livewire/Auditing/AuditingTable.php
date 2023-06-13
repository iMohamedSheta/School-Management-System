<?php

namespace App\Http\Livewire\Auditing;

use App\Models\AuditLog;
use Carbon\Carbon;
use Livewire\Component;

class AuditingTable extends Component
{
    public $search;
    public $start_date;
    public $end_date;


    public function render()
    {
        $auditsQuery = AuditLog::query();
        if ($this->search) {
            $auditsQuery->where(function ($query) {
                $query->whereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                        ->orWhere('name','%'.'like'. $this->search.'%');
                    });
            });
        }
        if ($this->start_date && $this->end_date) {
            $end_date = Carbon::parse($this->end_date)->addDay()->toDateString();
            $auditsQuery->whereBetween('created_at', [$this->start_date, $end_date]);
        }

        $audits =$auditsQuery->paginate(10);

        return view('livewire.auditing.auditing-table',compact('audits'));
    }
}
