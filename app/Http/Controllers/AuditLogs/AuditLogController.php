<?php

namespace App\Http\Controllers\AuditLogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    //
    public function index()
    {
    return view('auditing.auditing');
    }
}
