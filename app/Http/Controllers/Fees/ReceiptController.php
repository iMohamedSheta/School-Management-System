<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    //

    public function viewCreateReceipt($id)
    {
        $student=Student::findOrFail($id);
        return view('fees.receipts.create-receipt',compact('student'));
    }
}
