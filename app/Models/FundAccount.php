<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class FundAccount extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;
    protected $fillable = [
        'date',
        'receipt_id',
        'payment_id',
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
    public function payment()
    {
        return $this->belongsTo(PaymentStudent::class,'payment_id')->withDefault();
    }
}
