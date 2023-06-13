<?php

namespace App\Http\Livewire\Parents\ParentStudents;

use App\Models\ReceiptStudent;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;


class ParentChildrenReceiptTable extends Component
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


    public function loadReceipts()
    {
        $query = ReceiptStudent::query()->where('student_id', $this->selectedChild);
        if ($this->start_date && $this->end_date) {
            $end_date = Carbon::parse($this->end_date)->addDay()->toDateString();
            $query->whereBetween('created_at', [$this->start_date, $end_date]);
        }

        return $receipts = $query->paginate(10);
    }

    public function render()
    {
        if($this->selectedChild && $this->selectedChild !== 'AllChildren')
        {
            $receipts = $this->loadReceipts();
        }
        else
        {
            $childrenIds = $this->children->pluck('id')->toArray();
            $query = ReceiptStudent::query()->whereIn('student_id',$childrenIds);

            if ($this->start_date && $this->end_date) {
                $end_date = Carbon::parse($this->end_date)->addDay()->toDateString();
                $query->whereBetween('date', [$this->start_date, $end_date]);
            }

            $receipts = $query->paginate(10);
        }

            foreach ($receipts as $receipt) {
                #-------------------------format Current Whole Debit------------------------------------
                $receipt->student_current_debit = $receipt->student->student_account->sum('debit') - $receipt->student->student_account->sum('credit');

                // Convert amount to cents (or the smallest unit of currency)
                $amount = (int)(round($receipt->student_current_debit,2) * 100);
                $currencyCode = $receipt->currency_code;

                $money = new Money($amount, new Currency($currencyCode));

                // Create number formatter and currency object
                $locale = app()->getLocale(); // Set the locale to whatever you need
                $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
                $currencies = new ISOCurrencies();

                // Create the money formatter
                $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

                // Format the money object and set the formatted_student_current_debit property
                $formattedAmount = $moneyFormatter->format($money);
                $receipt->student_current_debit = $formattedAmount;



                // Convert amount to cents (or the smallest unit of currency)
                $amount = (int)(round($receipt->debit,2) * 100);
                $currencyCode = $receipt->currency_code;

                $money = new Money($amount, new Currency($currencyCode));

                // Create number formatter and currency object
                $locale = app()->getLocale(); // Set the locale to whatever you need
                $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
                $currencies = new ISOCurrencies();

                // Create the money formatter
                $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

                // Format the money object and set the formatted_amount property
                $formattedAmount = $moneyFormatter->format($money);
                $receipt->formatted_amount = $formattedAmount;
            }


        return view('livewire.parents.parent-students.parent-children-receipt-table',compact('receipts'));
    }
}
