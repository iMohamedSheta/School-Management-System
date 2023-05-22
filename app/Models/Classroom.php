<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $table = 'classrooms';

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public static function countClassrooms()
    {
        return self::count();
    }

    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function countStudents()
    {
        return $this->students()->count();
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_classroom', 'classroom_id', 'teacher_id');
    }

}
