<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'name',
        'academic_year',
        'date_birth',
        'blood_type_id',
        'nationality_id',
        'grade_id',
        'classroom_id',
        'parent_id',
        'religion_id',
        'gender_id',
    ];



    public function user()
    {
        return $this->belongsTo(User::class)->unique();
    }




    public function parent()
    {
        return $this->belongsTo(MyParent::class)->withDefault();
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class)->withDefault();
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class)->withDefault();
    }
    public function nationality()
    {
        return $this->belongsTo(Nationalitie::class)->withDefault();
    }
    public function religion()
    {
        return $this->belongsTo(Religion::class)->withDefault();
    }
    public function blood_type()
    {
        return $this->belongsTo(Type_Blood::class)->withDefault();
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class)->withDefault();
    }
}
