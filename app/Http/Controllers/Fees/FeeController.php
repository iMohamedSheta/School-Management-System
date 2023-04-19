<?php

namespace App\Http\Controllers\Fees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Feetype;

class FeeController extends Controller
{



    public function index()
    {
        //need php ini extension=intl
        return view('fees.fees');
    }


    public function createClassroomFee()
    {
        return view('fees.fee-create');
    }
    public function feesTypeView()
    {
        return view('fees.fee-types');
    }


    public function feeInfoView($id)
    {
        $fee= Fee::findOrFail($id);
        return view('fees.fee-information',compact('fee'));
    }


    public function feeInfoEditView($id)
    {
        $fee= Fee::findOrFail($id);
        return view('fees.fee-info-edit',compact('fee'));
    }





    public function destroy(Request $request)
    {
        if(auth()->user()->isAdmin())
        {
            $feeDelete = Fee::findOrFail($request->feeIdForDelete);
            $feeDeleted = $feeDelete->delete();
            if($feeDeleted)
            {
                return redirect()->back()->with('success',trans('alert.fee_deleted'));
            }

        }

        return redirect()->back()->with('error',trans('alert.error'));
    }






    public function deleteSelected(Request $request)
    {
        $feeIds = array_filter(explode(',',$request->selected_ids));
        $successCount = 0;

        if(auth()->user()->isAdmin())
        {
            if (count($feeIds) > 0) {
                foreach ($feeIds as $feeId) {
                    if(!empty($feeId)){
                        $fee = Fee::findOrFail($feeId);
                        if ($fee) {
                            $feeDelete = $fee->delete();
                            if ($feeDelete) {
                                $successCount++;
                            }
                        }
                    }
                }
            }

            if ($successCount == count($feeIds) && $successCount > 0 ) {
                return redirect()->back()->with('success',trans('alert.fee_deleted'));
            }
        }

        return redirect()->back()->with('error',trans('alert.error'));

    }



    public function feeTypeSelectedDestroy(Request $request)
    {
        $feetypesId=array_filter(explode(',',$request->selected_ids));
        $successCount = 0;

        if(auth()->user()->isAdmin())
        {
            if (count($feetypesId) > 0) {
                foreach ($feetypesId as $feetypeId) {
                    if(!empty($feetypeId)){
                        $feeType = Feetype::findOrFail($feetypeId);
                        $feeTypeDelete = $feeType->delete();
                        if ($feeTypeDelete) {
                            $successCount++;
                        }
                    }
                }
            }

            if ($successCount == count($feetypesId) && $successCount > 0 ) {
                return redirect()->back()->with('success',trans('alert.feetypes_deleted'));
            }

        }

        return redirect()->back()->with('error',trans('alert.error'));
    }
}
