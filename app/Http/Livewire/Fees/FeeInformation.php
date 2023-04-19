<?php

namespace App\Http\Livewire\Fees;

use App\Models\Fee;
use Livewire\Component;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

class FeeInformation extends Component
{
    public $fee;


    public function mount($fee)
    {
        $this->fee = $fee;
    }

    public function render()
    {
            $fee = $this->fee;

            // Convert amount to cents (or the smallest unit of currency)
            $amount = (int)(round($fee->amount,2) * 100);
            $currencyCode = $fee->currency_code;

            $money = new Money($amount, new Currency($currencyCode));

            // Create number formatter and currency object
            $locale = app()->getLocale(); // Set the locale to whatever you need
            $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY); //=> NumberFormatter uses php extenstion intl active it.
            $currencies = new ISOCurrencies();

            // Create the money formatter
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

            // Format the money object and set the formatted_amount property
            $formattedAmount = $moneyFormatter->format($money);
            $fee->formatted_amount = $formattedAmount;


        return view('livewire.fee-information',compact('fee'));
    }

    public function print()
    {
        $this->dispatchBrowserEvent('print');
    }
}
