<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'description',
        'grade_id',
        'classroom_id',
        'teacher_id',
    ];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id')->withDefault();
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class)->withDefault();
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class)->withDefault();
    }
}
