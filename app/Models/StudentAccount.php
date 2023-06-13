<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class StudentAccount extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;


    protected $fillable = [
        'student_id',
        'fee_invoice_id',
        'receipt_id',
        'processing_id',
        'payment_id',
        'currency_code',
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
    public function payment()
    {
        return $this->belongsTo(PaymentStudent::class,'payment_id')->withDefault();
    }


}
