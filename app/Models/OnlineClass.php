<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class OnlineClass extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;
    protected $fillable = [
        'user_id',
        'grade_id',
        'classroom_id',
        'meeting_id',
        'topic',
        'start_at',
        'duration',
        'password',
        'start_url',
        'join_url',
        'description',
    ];


    protected $dates = ['created_at', 'updated_at', 'start_at'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->withDefault();
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class,'grade_id','id')->withDefault();
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'classroom_id','id')->withDefault();
    }
}
