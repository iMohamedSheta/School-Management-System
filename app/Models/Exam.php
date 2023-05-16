<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name',
        'subject_id',
        'term',
        'academic_year',
        'description',
    ];


    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id')->withDefault();
    }
}
