<?php

namespace App\Http\Controllers\Parents\ParentStudents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentStudentController extends Controller
{
    //

    public function index()
    {
        return view('parents.parent-students.parent-students');
    }
    public function viewChildrenAttendance()
    {
        return view('parents.parent-children-attendances.parent-children-attendances');
    }
    public function viewChildrenInvoice()
    {
        return view('parents.parent-children-invoice.parent-children-invoices');
    }
    public function viewChildrenReceipt()
    {
        return view('parents.parent-children-receipts.parent-children-receipts');
    }
}
