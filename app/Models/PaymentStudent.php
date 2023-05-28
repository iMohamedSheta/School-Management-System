<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;


class PaymentStudent extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;

    protected $fillable = [
        'student_id',
        'title',
        'amount',
        'currency_code',
        'date',
        'description',
    ];


    public function student()
    {
        return $this->belongsTo(Student::class)->withDefault();
    }


    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_code','code')->withDefault();
    }
}
