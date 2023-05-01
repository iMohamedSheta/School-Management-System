<?php

namespace App\Http\Livewire\Fees\PaymentStudent;

use App\Models\Currency;
use App\Models\FeeInvoice;
use App\Models\FundAccount;
use App\Models\PaymentStudent;
use App\Models\StudentAccount;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Money\Currencies\ISOCurrencies;
use Money\Currency as MoneyCurrency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;


class CreatePayment extends Component
{
    public $student;
    public $title;
    public $amount;
    public $description;
    public $student_current_debit;
    public $currency_code;

    public function render()
    {
        // Convert amount to cents (or the smallest unit of currency)
        $this->student_current_debit = $this->student->student_account->sum('debit') - $this->student->student_account->sum('credit');
        $amount = (int)(round($this->student_current_debit,2) * 100);
        $studentCurrency = FeeInvoice::where('student_id',$this->student->id)->first();
        if($studentCurrency)
        {
            $currencyCode = $studentCurrency->currency_code;

            $money = new Money($amount, new MoneyCurrency($currencyCode));

            // Create number formatter and currency object
            $locale = app()->getLocale(); // Set the locale to whatever you need
            $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
            $currencies = new ISOCurrencies();

            // Create the money formatter
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

            // Format the money object and set the formatted_student_current_debit property
            $formattedAmount = $moneyFormatter->format($money);
            $this->student_current_debit = $formattedAmount;
        }

        $currencies = Currency::all();
        return view('livewire.fees.payment-student.create-payment',compact('currencies'));
    }

    public function createPayment()
    {
        $validatedData = $this->validate([
            'title'=>'string|required',
            'amount' => 'required|numeric',
            'currency_code' => 'required|exists:currencies,code',
            'description' => 'nullable',
        ]);

        if($validatedData)
        {

            DB::beginTransaction();
        try{
            $paymentCreate = PaymentStudent::create([
                'student_id'=>$this->student->id,
                'title'=>$this->title,
                'amount'=>$this->amount,
                'currency_code'=>$this->currency_code,
                'description'=>$this->description,
                'date'=>date('Y-m-d'),
            ]);

            if($paymentCreate)
            {
                $FundAccountCreate = FundAccount::create([
                    'payment_id'=>$paymentCreate->id,
                    'debit'=>0.00,
                    'credit'=>$this->amount,
                    'currency_code'=>$this->currency_code,
                    'description'=>$this->description,
                    'date'=>date('Y-m-d'),
                ]);
            }

            if($FundAccountCreate)
            {
                StudentAccount::create([
                    'student_id'=>$this->student->id,
                    'payment_id'=>$paymentCreate->id,
                    'currency_code'=>$this->currency_code,
                    'debit'=>$this->amount,
                    'credit'=>0.00,
                    'description'=>$this->description,
                    'type'=>"payment",
                ]);
            }

            DB::commit();

            return redirect()->route('payment.create',$this->student->id)->with('success',trans('alert.student-payment-created',['name'=>$this->student->name]));

        }
        catch(\Exception $e)
        {
            DB::rollBack();
            toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
        }
    }

    }
}
