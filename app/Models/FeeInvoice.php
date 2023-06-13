<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class FeeInvoice extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;


    protected $fillable = [
        'invoice_date',
        'amount',
        'grade_id',
        'student_id',
        'classroom_id',
        'currency_code',
        'fee_id',
        'feetype_id',
        'description',
    ];




    public function student()
    {
        return $this->belongsTo(Student::class)->withDefault();
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class)->withDefault();
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class)->withDefault();
    }
    public function fee()
    {
        return $this->belongsTo(Fee::class)->withDefault();
    }
    public function feetype()
    {
        return $this->belongsTo(Feetype::class)->withDefault();
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_code','code')->withDefault();
    }
}
