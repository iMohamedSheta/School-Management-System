<?php

namespace App\Http\Controllers\Fees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FeeController extends Controller
{

    public function index()
    {
        return view('fees.fees');
    }
    public function createClassroomFee()
    {
        return view('fees.fee-create');
    }

    
}
