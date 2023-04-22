<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    use HasFactory;


    protected $fillable = [
        'debit',
        'fee_invoice_id',
        'student_id',
        'credit',
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



}
