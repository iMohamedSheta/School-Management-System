<?php

namespace App\Http\Livewire\Parents\ParentStudents;

use Livewire\Component;
use App\Models\FeeInvoice;
use Carbon\Carbon;
use Livewire\WithPagination;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

class ParentChildrenInvoiceTable extends Component
{

    use WithPagination;

    public $children;
    public $start_date;
    public $end_date;
    public $selectedChild;


    public function mount()
    {
        // Retrieve the authenticated parent's children
        $this->children = auth()->user()->parent->students;
    }


    public function loadInvoices()
    {
        $query = FeeInvoice::query()->where('student_id', $this->selectedChild);
        if ($this->start_date && $this->end_date) {
            $end_date = Carbon::parse($this->end_date)->addDay()->toDateString();
            $query->whereBetween('created_at', [$this->start_date, $end_date]);
        }

        return $feesinvoices = $query->paginate(10);
    }
    public function render()
    {
        if($this->selectedChild && $this->selectedChild !== 'AllChildren')
        {
            $feesinvoices = $this->loadInvoices();
        }
        else
        {
            $childrenIds = $this->children->pluck('id')->toArray();
            $query = FeeInvoice::query()->whereIn('student_id',$childrenIds);
            if ($this->start_date && $this->end_date) {
                $end_date = Carbon::parse($this->end_date)->addDay()->toDateString();
                $query->whereBetween('created_at', [$this->start_date, $end_date]);
            }
            $feesinvoices = $query->paginate(10);
        }

        foreach ($feesinvoices as $feeinvoice) {
            #-------------------------format Current Whole Debit------------------------------------
            $feeinvoice->student_current_debit = $feeinvoice->student->student_account->sum('debit') - $feeinvoice->student->student_account->sum('credit');

            // Convert amount to cents (or the smallest unit of currency)
            $amount = (int)(round($feeinvoice->student_current_debit,2) * 100);
            $currencyCode = $feeinvoice->currency_code;

            $money = new Money($amount, new Currency($currencyCode));

            // Create number formatter and currency object
            $locale = app()->getLocale(); // Set the locale to whatever you need
            $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
            $currencies = new ISOCurrencies();

            // Create the money formatter
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

            // Format the money object and set the formatted_student_current_debit property
            $formattedAmount = $moneyFormatter->format($money);
            $feeinvoice->student_current_debit = $formattedAmount;



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
        return view('livewire.parents.parent-students.parent-children-invoice-table',compact('feesinvoices'));
    }
}
