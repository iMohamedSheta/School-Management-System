<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Models\PaymentStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentStudentController extends Controller
{
    //


    public function index()
    {
        return view('fees.payment-students.payment');
    }

    public function viewCreatePayment($id)
    {
        $student=Student::findOrFail($id);
        return view('fees.payment-students.create-payment',compact('student'));
    }

    public function paymentsDeleteSelected(Request $request)
    {
        $paymentIds = array_filter(explode(',',$request->selected_ids));
        $successCount = 0;

            if (count($paymentIds) > 0) {
                foreach ($paymentIds as $paymentId) {
                    if(!empty($paymentId)){
                        $payment = PaymentStudent::findOrFail($paymentId);
                        $paymentDelete = $payment->delete();
                        if ($paymentDelete) {
                            $successCount++;
                        }
                    }
                }
            }

            if ($successCount == count($paymentIds) && $successCount > 0 ) {
                return redirect()->back()->with('success',trans('alert.payments_deleted'));
            }


        return redirect()->back()->with('error',trans('alert.error'));
    }
}
