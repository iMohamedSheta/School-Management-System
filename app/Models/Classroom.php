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

}
