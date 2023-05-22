<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClassroom extends Model
{
    use HasFactory;
    protected $fillable=['teacher_id','classroom_id'];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id','id')->withDefault();
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'classroom_id','id')->withDefault();
    }

}
