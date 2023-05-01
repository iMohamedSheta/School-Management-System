<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Models\ProcessingFee;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProcessingFeeController extends Controller
{
    //
    public function index()
    {
        return view('fees.processing-fees.processingfee');
    }
    public function viewCreateProcessingFee($id) : View
    {
        $student=Student::findOrFail($id);
        return view('fees.processing-fees.create-processing',compact('student'));
    }



    public function processingfeesDeleteSelected(Request $request) : RedirectResponse
    {
        $processingfeeIds =array_filter(explode(',',$request->selected_ids));
        $successCount = 0;

            if (count($processingfeeIds) > 0) {
                foreach ($processingfeeIds as $processingfeeId) {
                    if(!empty($processingfeeId)){
                        $receipt = ProcessingFee::findOrFail($processingfeeId);
                        $receiptDelete = $receipt->delete();
                        if ($receiptDelete) {
                            $successCount++;
                        }
                    }
                }
            }

            if ($successCount == count($processingfeeIds) && $successCount > 0 ) {
                return redirect()->back()->with('success',trans('alert.processingfees_deleted'));
            }


        return redirect()->back()->with('error',trans('alert.error'));
    }
}
