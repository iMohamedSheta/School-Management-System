<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;


class User extends Authenticatable implements HasMedia, Auditable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use InteractsWithMedia;
    use AuditingAuditable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];




    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }


    public static function countUsers()
    {
        return self::count();
    }


    public static function getNewUserPercentage()
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





    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }


        public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin()
    {
        return $this->roles()->where('name', 'Admin')->exists();
    }

    public function isTeacher()
    {
        return $this->roles()->where('name', 'Teacher')->exists();
    }

    public function isStudent()
    {
        return $this->roles()->where('name', 'Student')->exists();
    }

    public function isParent()
    {
        return $this->roles()->where('name', 'Parent')->exists();
    }



    //--------------------------
    public function parent()
    {
        if ($this->isParent())
        {
            return $this->hasOne(MyParent::class)->withDefault();
        }
        else
        {
            return abort(403,'Unauthorized action.');
        }
    }
    public function teacher()
    {
        if ($this->isTeacher())
        {
            return $this->hasOne(Teacher::class)->withDefault();
        }
        else
        {
            return abort(403,'Unauthorized action.');
        }
    }
    public function student()
    {
        if ($this->isStudent())
        {
            return $this->hasOne(Student::class)->withDefault();
        }
        else
        {
            return abort(403,'Unauthorized action.');
        }
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }





}
