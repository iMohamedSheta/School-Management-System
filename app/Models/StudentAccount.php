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
        'processing_id',
        'debit',
        'credit',
        "type",
        'description',
    ];


    public function student()
    {
        return $this->belongsTo(Student::class,'student_id')->withDefault();
    }
    public function feeinvoice()
    {
        return $this->belongsTo(FeeInvoice::class,'fee_invoice_id')->withDefault();
    }

    public function receipt()
    {
        return $this->belongsTo(ReceiptStudent::class,'receipt_id')->withDefault();
    }
    public function processingfee()
    {
        return $this->belongsTo(ProcessingFee::class,'processing_id')->withDefault();
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_code','code')->withDefault();
    }


}