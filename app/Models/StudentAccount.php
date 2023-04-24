<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id',
        'fee_invoice_id',
        'receipt_id',
        'currency_code',
        'debit',
        'credit',
        "type",
        'description',
    ];


    public function student()
    {
        return $this->belongsTo(Student::class)->withDefault();
    }
    public function feeinvoice()
    {
        return $this->belongsTo(FeeInvoice::class)->withDefault();
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
