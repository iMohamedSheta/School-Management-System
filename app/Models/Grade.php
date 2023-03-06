<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    // Import the HasFactory and HasTranslations traits
    use HasFactory;
    use HasTranslations;

    // Define the $translatable property, indicating which fields should be translated
    public $translatable = ['name'];

    // Define the $fillable property, indicating which fields can be mass-assigned
    protected $fillable = [
        'name',
        'notes',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }


    // To overwrite the default behavior of the asJson() method from the HasTranslations trait...
    protected function asJson($value)
    {
        // Encode the given value as a JSON string, ensuring that Unicode characters are not escaped
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }



}
