<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'student_id',
        'from_grade',
        'from_classroom',
        'to_grade',
        'to_classroom',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function old_grade()
    {
        return $this->belongsTo(Grade::class,'from_grade');
    }
    public function new_grade()
    {
        return $this->belongsTo(Grade::class,'to_grade');
    }
    public function old_classroom()
    {
        return $this->belongsTo(Classroom::class,'from_classroom');
    }
    public function new_classroom()
    {
        return $this->belongsTo(Classroom::class,'to_classroom');
    }

}
