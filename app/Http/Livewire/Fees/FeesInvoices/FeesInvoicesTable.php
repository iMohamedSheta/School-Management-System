<?php

namespace App\Http\Livewire\Fees\FeesInvoices;

use App\Models\Classroom;
use App\Models\FeeInvoice;
use App\Models\Grade;
use App\Models\Fee;
use Livewire\Component;
use Livewire\WithPagination;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;


class FeesInvoicesTable extends Component
{
    use WithPagination;
    public $search;
    public $classrooms=[];
    public $selectedGrade;
    public $selectedClassroom;
    public $selectedFee;
    public $grade_id;
    public $classroom_id;

    public $listeners = ['updatedGradeId','deleted'=>'$refresh','edited'=>'$refresh'];



    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = Classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }



    public function render()
    {

        $feesinvoicesQuery = FeeInvoice::query();

        if ($this->selectedGrade && $this->selectedGrade !== 'AllFees') {
            $feesinvoicesQuery->where('grade_id', $this->selectedGrade);
        }

        if ($this->selectedClassroom && $this->selectedClassroom !== 'AllClassrooms') {
            $feesinvoicesQuery->where('classroom_id', $this->selectedClassroom);
        }
        if ($this->selectedFee && $this->selectedClassroom !== 'AllClassrooms') {
            $feesinvoicesQuery->where('fee_id', $this->selectedFee);
        }

        if ($this->search) {
            $feesinvoicesQuery->where(function ($query) {
                $query->where('description', 'like', '%' . $this->search . '%')
                ->orWhereHas('fee', function ($query) {
                    $query->where('title','like','%'.$this->search.'%')
                    ->orWhere('description','like','%'.$this->search.'%');
                })
                    ->orWhereHas('feetype', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                    ->orWhereHas('student', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%');
                    });
                });
            });
        }


        $grades=Grade::all();
        $fees=Fee::all();
        $feesinvoices= $feesinvoicesQuery->paginate(10);

        foreach ($feesinvoices as $feeinvoice) {
            // Convert amount to cents (or the smallest unit of currency)
            $amount = (int)(round($feeinvoice->amount,2) * 100);
            $currencyCode = $feeinvoice->currency_code;

            $money = new Money($amount, new Currency($currencyCode));

            // Create number formatter and currency object
            $locale = app()->getLocale(); // Set the locale to whatever you need
            $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
            $currencies = new ISOCurrencies();

            // Create the money formatter
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

            // Format the money object and set the formatted_amount property
            $formattedAmount = $moneyFormatter->format($money);
            $feeinvoice->formatted_amount = $formattedAmount;
        }

        return view('livewire.fees.fees-invoices.fees-invoices-table',compact('feesinvoices','grades','fees'));
    }
}
