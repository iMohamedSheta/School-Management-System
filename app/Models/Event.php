<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;


class Event extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;

    protected $fillable=['title','start','end'];
}
