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
        'teacher_id',
    ];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id')->withDefault();
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class,'subject_id','classroom_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class)->withDefault();
    }
}
