<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Student extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;

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

        // Get the start of the previous year
        $lastYearStart = Carbon::now()->subYear()->startOfYear();

        $totalUsers = self::countStudents(); // Get the total number of students

        // Get the count of new users created in the current year
        $newUsers = self::where('created_at', '>=', $yearStart)->count();

        // Get the count of users created in the previous year
        $lastYearUsers = self::whereBetween('created_at', [$lastYearStart, $yearStart])->count();

        // Calculate the difference in users compared to last year
        $diff = $totalUsers - $lastYearUsers;

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

    public function countAbsentAttendances()
    {
        return $this->attendances()->where('attendence_status', 'absent')->count();
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
    public function subjects()
    {
        return $this->classroom->subjects();
    }

}
