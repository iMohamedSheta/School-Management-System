<?php

namespace App\Http\Livewire\Fees\Receipts;

use Livewire\Component;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

class ReceiptInformation extends Component
{

    public $receipt;
    public $openModal = false;

    public function openModalToShowInfo()
    {
        $this->openModal = true;
    }

    public function mount($receipt)
    {
        $this->receipt= $receipt;

    }
    public function render()
    {
        // Convert amount to cents (or the smallest unit of currency)
        $amount = (int)(round($this->receipt->debit,2) * 100);
        $currencyCode = $this->receipt->currency_code;

        $money = new Money($amount, new Currency($currencyCode));

        // Create number formatter and currency object
        $locale = app()->getLocale(); // Set the locale to whatever you need
        $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
        $currencies = new ISOCurrencies();

        // Create the money formatter
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        // Format the money object and set the formatted_amount property
        $formattedAmount = $moneyFormatter->format($money);
        $this->receipt->formatted_amount = $formattedAmount;
        return view('livewire.fees.receipts.receipt-information');
    }
}
