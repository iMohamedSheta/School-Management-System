<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\AuditObserver;

class AuditLog extends Model
{
    use HasFactory;

    protected $table = 'audits';
    protected $fillable = [
        'user_type',
        'user_id',
        'event',
        'auditable_type',
        'auditable_id',
        'old_values',
        'new_values',
        'url',
        'ip_address',
        'user_agent',
        'tags',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getAuditObserver(): string
    {
        return AuditObserver::class;
    }

}
