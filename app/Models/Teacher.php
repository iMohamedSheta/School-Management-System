<?php

namespace App\Models;
use Carbon\Carbon;
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
        return $this->belongsTo(User::class);
    }

    public static function countTeachers()
    {
        return self::count();
    }


    public static function getNewTeacherPercentage()
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
