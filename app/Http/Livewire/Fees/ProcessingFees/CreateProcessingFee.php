<?php

namespace App\Http\Livewire\Fees\ProcessingFees;

use App\Models\Currency;
use App\Models\FeeInvoice;
use App\Models\ProcessingFee;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Money\Currencies\ISOCurrencies;
use Money\Currency as MoneyCurrency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

class CreateProcessingFee extends Component
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
                $this->student_current_debit = number_format($this->student->student_account->sum('debit') - $this->student->student_account->sum('credit'), 2);
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
        return view('livewire.fees.processing-fees.create-processing-fee',compact('currencies'));
    }


    public function createProcessingFee()
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
            try {
            $processingFeeCreate = ProcessingFee::create([
                'student_id'=>$this->student->id,
                'title'=>$this->title,
                'amount'=>$this->amount,
                'currency_code'=>$this->currency_code,
                'description'=>$this->description,
                'date'=>date('Y-m-d'),
            ]);

            if($processingFeeCreate)
            {
                StudentAccount::create([
                    'student_id'=>$this->student->id,
                    'processing_id'=>$processingFeeCreate->id,
                    'currency_code'=>$this->currency_code,
                    'debit'=>0.00,
                    'credit'=>$this->amount,
                    'description'=>$this->description,
                    'type'=>"processingfee",
                ]);
            }

            DB::commit();

            return redirect()->route('processingfee.create',$this->student->id)->with('success',trans('alert.student-processingfee-created',['name'=>$this->student->name]));

        }
        catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('alert.error_title'), trans('alert.error'), ['timeOut' => 3000]);
        }
    }

    }
}
