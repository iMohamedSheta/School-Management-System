<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Models\ReceiptStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    //

    public function index()
    {
        return view('fees.receipts.receipts');
    }

    public function viewCreateReceipt($id)
    {
        $student=Student::findOrFail($id);
        return view('fees.receipts.create-receipt',compact('student'));
    }


    public function receiptsDeleteSelected(Request $request)
    {
        $receiptIds =array_filter(explode(',',$request->selected_ids));
        $successCount = 0;

            if (count($receiptIds) > 0) {
                foreach ($receiptIds as $receiptId) {
                    if(!empty($receiptId)){
                        $receipt = ReceiptStudent::findOrFail($receiptId);
                        $receiptDelete = $receipt->delete();
                        if ($receiptDelete) {
                            $successCount++;
                        }
                    }
                }
            }

            if ($successCount == count($receiptIds) && $successCount > 0 ) {
                return redirect()->back()->with('success',trans('alert.receipts_deleted'));
            }


        return redirect()->back()->with('error',trans('alert.error'));
    }
}
