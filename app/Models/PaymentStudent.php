<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStudent extends Model
{
    use HasFactory;

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
