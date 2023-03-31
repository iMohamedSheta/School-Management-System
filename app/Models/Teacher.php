<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'teacher_name',
        'national_id_teacher',
        'passport_id_teacher',
        'phone_teacher',
        'address',
        'specialization_id',
        'nationality_id',
        'religion_id',
        'blood_type_id',
        'gender_id',
        'joining_date',
    ];


    public function user()
    {
        return $this->belongsTo(User::class)->unique();
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class)->withDefault();
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
