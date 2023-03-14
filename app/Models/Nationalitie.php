<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationalitie extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['name'];


    // To overwrite the default behavior of the asJson() method from the HasTranslations trait...
    protected function asJson($value)
    {
        // Encode the given value as a JSON string, ensuring that Unicode characters are not escaped
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
