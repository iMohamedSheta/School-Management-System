<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Models\FeeInvoice;
use App\Models\Student;
use Illuminate\Http\Request;

class FeeInvoiceController extends Controller
{
    //

    public function index()
    {
        return view('fees.fees-invoices.fees-invoices');
    }

    public function viewCreateFeeInvoice($id)
    {
        $student=Student::findOrFail($id);
        return view('fees.fees-invoices.fee-invoice-create',compact('student'));

    }

    public function feesInvoicesDeleteSelected(Request $request)
    {
        $feeinvoiceIds =array_filter(explode(',',$request->selected_ids));
        $successCount = 0;

            if (count($feeinvoiceIds) > 0) {
                foreach ($feeinvoiceIds as $feeinvoiceId) {
                    if(!empty($feeinvoiceId)){
                        $feeinvoice = FeeInvoice::findOrFail($feeinvoiceId);
                        $feeinvoiceDelete = $feeinvoice->delete();
                        if ($feeinvoiceDelete) {
                            $successCount++;
                        }
                    }
                }
            }

            if ($successCount == count($feeinvoiceIds) && $successCount > 0 ) {
                return redirect()->back()->with('success',trans('alert.feeinvoices_deleted'));
            }


        return redirect()->back()->with('error',trans('alert.error'));

    }


}
