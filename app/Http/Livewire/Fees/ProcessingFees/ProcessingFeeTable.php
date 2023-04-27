<?php

namespace App\Http\Livewire\Fees\ProcessingFees;

use App\Models\FeeInvoice;
use App\Models\ProcessingFee;
use Livewire\Component;
use Livewire\WithPagination;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

class ProcessingFeeTable extends Component
{
    use WithPagination;

    public $search;
    public $title;
    public $amount;
    public $description;
    public $currency_code;

    public $listeners = ['deleted'=>'$refresh','edited'=>'$refresh'];

    public function render()
    {

        $processingfeesQuery=ProcessingFee::query();

        if ($this->search) {
            $processingfeesQuery->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description','like','%'.$this->search.'%')
                    ->orWhereHas('student', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%');
                    });
                });
            });
        }

        $processingfees=$processingfeesQuery->paginate(10);
        foreach($processingfees as $processingfee)
        {
            #-------------------------format Current Whole Debit------------------------------------
            $processingfee->student_current_debit = number_format($processingfee->student->student_account->sum('debit') - $processingfee->student->student_account->sum('credit'), 2);

            // Convert amount to cents (or the smallest unit of currency)
            $amount = (int)(round($processingfee->student_current_debit,2) * 100);
            $currencyCode = $processingfee->currency_code;

            $money = new Money($amount, new Currency($currencyCode));

            // Create number formatter and currency object
            $locale = app()->getLocale(); // Set the locale to whatever you need
            $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
            $currencies = new ISOCurrencies();

            // Create the money formatter
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

            // Format the money object and set the formatted_student_current_debit property
            $formattedAmount = $moneyFormatter->format($money);
            $processingfee->student_current_debit = $formattedAmount;

            #---------------------Format Amount------------------
            // Convert amount to cents (or the smallest unit of currency)
            $amount = (int)(round($processingfee->amount ,2) * 100);
            $currencyCode = $processingfee->currency_code;

            $money = new Money($amount, new Currency($currencyCode));

            // Create number formatter and currency object
            $locale = app()->getLocale(); // Set the locale to whatever you need
            $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
            $currencies = new ISOCurrencies();

            // Create the money formatter
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

            // Format the money object and set the formatted_amount property
            $formattedAmount = $moneyFormatter->format($money);
            $processingfee->amount_ = $formattedAmount;
        }


        return view('livewire.fees.processing-fees.processing-fee-table',compact('processingfees'));
    }
}
