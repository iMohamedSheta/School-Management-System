<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

class MyParent extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;

    protected $fillable = [
        'user_id',
        'Name_Father',
        'National_ID_Father',
        'Passport_ID_Father',
        'Phone_Father',
        'Job_Father',
        'Nationality_Father_id',
        'Blood_Type_Father_id',
        'Religion_Father_id',
        'Address_Father',

        'Name_Mother',
        'National_ID_Mother',
        'Passport_ID_Mother',
        'Phone_Mother',
        'Job_Mother',
        'Nationality_Mother_id',
        'Blood_Type_Mother_id',
        'Religion_Mother_id',
        'Address_Mother',


    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class,'parent_id');
    }

    public function countChildren()
    {
        return $this->students()->count();
    }
    public function getTotalChildrenDebit()
    {
        $children = $this->students;
        $total_debit= 0;
        foreach($children as $child)
        {
            $debit = $child->student_account->sum('debit') - $child->student_account->sum('credit');
            $total_debit += $debit;
        }
         // Convert amount to cents (or the smallest unit of currency)
         $amount = (int)(round($total_debit,2) * 100);
         $currencyCode = $children->first()->student_account->first()->currency->code;

         $money = new Money($amount, new Currency($currencyCode));

         // Create number formatter and currency object
         $locale = app()->getLocale(); // Set the locale to whatever you need
         $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
         $currencies = new ISOCurrencies();

         // Create the money formatter
         $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

         // Format the money object and set the formatted_student_current_debit property
         $formattedAmount = $moneyFormatter->format($money);
         $total_debit = $formattedAmount;
        return $total_debit;
    }


    public function nationality_father()
    {
        return $this->belongsTo(Nationalitie::class,"Nationality_Father_id")->withDefault();
    }
    public function nationality_mother()
    {
        return $this->belongsTo(Nationalitie::class,"Nationality_Mother_id")->withDefault();
    }


    public function blood_type_father()
    {
        return $this->belongsTo(Type_Blood::class,'Blood_Type_Father_id')->withDefault();
    }
    public function blood_type_mother()
    {
        return $this->belongsTo(Type_Blood::class,'Blood_Type_Mother_id')->withDefault();
    }

    public function religion_mother()
{
    return $this->belongsTo(Religion::class, 'Religion_Mother_id')->withDefault();
}

    public function religion_father()
{
    return $this->belongsTo(Religion::class, 'Religion_Father_id')->withDefault();
}




}
