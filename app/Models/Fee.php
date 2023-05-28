<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Fee extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;


    // Define the $fillable property, indicating which fields can be mass-assigned
    protected $fillable = [
        'title',
        'amount',
        'grade_id',
        'feetype_id',
        'classroom_id',
        'currency_code',
        'description',
        'year',
        'due_date',
    ];


    public function classroom()
    {
        return $this->belongsTo(Classroom::class)->withDefault();
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class)->withDefault();
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
