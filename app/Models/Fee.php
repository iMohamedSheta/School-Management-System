<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    // Define the $fillable property, indicating which fields can be mass-assigned
    protected $fillable = [
        'title',
        'amount',
        'grade_id',
        'classroom_id',
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




}
