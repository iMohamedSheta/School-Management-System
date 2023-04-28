<?php

namespace App\Http\Livewire\Fees\PaymentStudent;

use App\Models\PaymentStudent;
use Livewire\Component;
use Livewire\WithPagination;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;


class PaymentTable extends Component
{
    use WithPagination;
    public $search;

    public $listeners = ['deleted'=>'$refresh','edited'=>'$refresh'];

    public function render()
    {
        $paymentQuery = PaymentStudent::query();

        if ($this->search) {
            $paymentQuery->where(function ($query) {
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


        $payments= $paymentQuery->paginate(10);

        foreach ($payments as $payment) {
            // Convert amount to cents (or the smallest unit of currency)
            $amount = (int)(round($payment->amount,2) * 100);
            $currencyCode = $payment->currency_code;

            $money = new Money($amount, new Currency($currencyCode));

            // Create number formatter and currency object
            $locale = app()->getLocale(); // Set the locale to whatever you need
            $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
            $currencies = new ISOCurrencies();

            // Create the money formatter
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

            // Format the money object and set the formatted_amount property
            $formattedAmount = $moneyFormatter->format($money);
            $payment->formatted_amount = $formattedAmount;
        }

        return view('livewire.fees.payment-student.payment-table',compact('payments'));
    }
}
