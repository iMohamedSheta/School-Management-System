<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feetype extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'name_en',
        'description',
    ];



}
