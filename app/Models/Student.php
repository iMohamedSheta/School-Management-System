<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
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
        'deleted_at',
        'graduated',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }


  public static function countStudents()
    {
        return self::count();
    }


    public static function getNewStudentPercentage()
{
    $yearStart = Carbon::now()->startOfYear(); // Get the start of the current year
    $lastYearStart = Carbon::now()->subYear()->startOfYear(); // Get the start of the previous year
    $totalUsers = self::count(); // Get the total number of users
    $newUsers = self::where('created_at', '>=', $yearStart)->count(); // Get the count of new users created in the current year
    $lastYearUsers = self::whereBetween('created_at', [$lastYearStart, $yearStart])->count(); // Get the count of users created in the previous year

    $diff = $totalUsers - $lastYearUsers; // Calculate the difference in users compared to last year

    if ($lastYearUsers > 0 && $diff < 0) {
        // If there were fewer users this year compared to last year, return the negative percentage
        return round(($diff / $lastYearUsers) * 100, 2);
    } else if ($totalUsers > 0) {
        // If there were no users last year, or the number of users increased this year, return the positive percentage
        return '+'.round(($newUsers / $totalUsers) * 100, 2);
    } else {
        // If there are no users in the database, return 0
        return 0;
    }
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

    public function student_account()
    {
        return $this->hasMany(StudentAccount::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }
}
