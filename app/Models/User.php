<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use InteractsWithMedia;


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
