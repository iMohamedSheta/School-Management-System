<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyParent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'Name_Father',
        'National_ID_Father',
        'Passport_ID_Father',
        'Phone_Father',
        'Job_Father',
        'Nationality_Father_id',
        'Blood_Type_Father_id',
        'Religion_Father_id',
        'Address_Father',

        'Name_Mother',
        'National_ID_Mother',
        'Passport_ID_Mother',
        'Phone_Mother',
        'Job_Mother',
        'Nationality_Mother_id',
        'Blood_Type_Mother_id',
        'Religion_Mother_id',
        'Address_Mother',


    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function nationality_father()
    {
        return $this->belongsTo(Nationalitie::class,"Nationality_Father_id")->withDefault();
    }
    public function nationality_mother()
    {
        return $this->belongsTo(Nationalitie::class,"Nationality_Mother_id")->withDefault();
    }


    public function blood_type_father()
    {
        return $this->belongsTo(Type_Blood::class,'Blood_Type_Father_id')->withDefault();
    }
    public function blood_type_mother()
    {
        return $this->belongsTo(Type_Blood::class,'Blood_Type_Mother_id')->withDefault();
    }

    public function religion_mother()
{
    return $this->belongsTo(Religion::class, 'Religion_Mother_id')->withDefault();
}

    public function religion_father()
{
    return $this->belongsTo(Religion::class, 'Religion_Father_id')->withDefault();
}




}
