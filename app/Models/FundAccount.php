<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'receipt_id',
        'debit',
        'credit',
        'currency_code',
        'description',
    ];


    public function student()
    {
        return $this->belongsTo(Student::class)->withDefault();
    }
    public function receipt()
    {
        return $this->belongsTo(ReceiptStudent::class)->withDefault();
    }


    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_code','code')->withDefault();
    }
}
