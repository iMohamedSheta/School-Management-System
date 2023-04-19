<?php

namespace App\Http\Livewire\Fees;

use Livewire\Component;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Fee;
use Livewire\WithPagination;

    use Money\Currencies\ISOCurrencies;
    use Money\Currency;
    use Money\Formatter\IntlMoneyFormatter;
    use Money\Money;


class ClassroomsFeesTable extends Component
{
    use WithPagination;
    public $search;
    public $classrooms=[];
    public $selectedGrade;
    public $selectedClassroom;

    protected $listeners = ['updatedGradeId'];


    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }

    public function render()
    {

        $feesQuery = Fee::query();

        if ($this->selectedGrade && $this->selectedGrade !== 'AllGrades') {
            $feesQuery->where('grade_id', $this->selectedGrade);
        }

        if ($this->selectedClassroom && $this->selectedClassroom !== 'AllClassrooms') {
            $feesQuery->where('classroom_id', $this->selectedClassroom);
        }

        if ($this->search) {
            $feesQuery->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('year', 'like', '%' . $this->search . '%')
                ->orWhereHas('feetype', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            });
        }

        $fees = $feesQuery->paginate(10);
        $grades = Grade::all();


        foreach ($fees as $fee) {
            // Convert amount to cents (or the smallest unit of currency)
            $amount = (int)(round($fee->amount,2) * 100);
            $currencyCode = $fee->currency_code;

            $money = new Money($amount, new Currency($currencyCode));

            // Create number formatter and currency object
            $locale = app()->getLocale(); // Set the locale to whatever you need
            $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
            $currencies = new ISOCurrencies();

            // Create the money formatter
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

            // Format the money object and set the formatted_amount property
            $formattedAmount = $moneyFormatter->format($money);
            $fee->formatted_amount = $formattedAmount;
        }


        return view('livewire.classrooms-fees-table',compact('fees','grades'));
    }
}
