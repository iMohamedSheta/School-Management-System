<?php

namespace App\Http\Livewire\Fees\FeesInvoices;

use Livewire\Component;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

class FeeInvoiceInformation extends Component
{

    public $feeinvoice;
    public $openModal = false;

    public function openModalToShowInfo()
    {
        $this->openModal = true;
    }


    public function render()
    {

        // Convert amount to cents (or the smallest unit of currency)
        $amount = (int)(round($this->feeinvoice->amount,2) * 100);
        $currencyCode = $this->feeinvoice->currency_code;

        $money = new Money($amount, new Currency($currencyCode));

        // Create number formatter and currency object
        $locale = app()->getLocale(); // Set the locale to whatever you need
        $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
        $currencies = new ISOCurrencies();

        // Create the money formatter
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        // Format the money object and set the formatted_amount property
        $formattedAmount = $moneyFormatter->format($money);
        $this->feeinvoice->formatted_amount = $formattedAmount;

        return view('livewire.fees.fees-invoices.fee-invoice-information');
    }
}
