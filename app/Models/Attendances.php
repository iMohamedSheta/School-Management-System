<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Attendances extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;

    protected $fillable =
    [
        'student_id',
        'grade_id',
        'classroom_id',
        'teacher_id',
        'attendence_date',
        'attendence_status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id')->withDefault();
    }

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
