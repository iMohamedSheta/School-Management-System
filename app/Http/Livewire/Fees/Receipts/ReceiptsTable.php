<?php

namespace App\Http\Livewire\Fees\Receipts;

use App\Models\ReceiptStudent;
use Livewire\Component;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

class ReceiptsTable extends Component
{
    public $search;

    public $listeners = ['deleted'=>'$refresh','edited'=>'$refresh'];


    public function render()
    {
        $receiptsQuery = ReceiptStudent::query();

        if ($this->search) {
            $receiptsQuery->where(function ($query) {
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


        $receipts= $receiptsQuery->paginate(10);

        foreach ($receipts as $receipt) {
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
        return view('livewire.fees.receipts.receipts-table',compact('receipts'));
    }
}
