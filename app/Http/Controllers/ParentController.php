<?php

namespace App\Http\Controllers;

use App\Models\MyParent;
use App\Models\User;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    //

    public function index()
    {
        return view('parents.parents');
    }

    public function parentInfoView($id)
    {
        $parent = MyParent::findOrFail($id);
        return view('parents.parent-info',compact('parent'));
    }


    public function destroy(Request $request)
    {
        if(auth()->user()->isAdmin())
        {
            $userId = $request->parentIdForDelete;
            $user = User::where('id',$userId)->first();
            $deleteParentUser = $user->delete();

            if($deleteParentUser)
            {
                return redirect()->back()->with('success', trans('alert.delete_parent_success'));
            }
        }

        return redirect()->back()->with('error', trans('alert.error'));

    }


    public function deleteSelected(Request $request)
    {

        if(auth()->user()->isAdmin())
        {
            $selectedIds = explode(',', $request->selected_parents_ids);

        //Loop through the selected students to get the user account and put all the id in array

            foreach ($selectedIds as $id)
            {
                $idsToDelete[] = $id;
            }

            if(empty($idsToDelete))
            {
                return redirect()->back()->with('error', trans('alert.errorselect'));
            }


            if (count($idsToDelete) > 0) {

                User::destroy($idsToDelete);
                return redirect()->back()->with('success', trans('alert.deletedselected'));
            }
        }

        return redirect()->back()->with('error', trans('alert.error'));
    }
}
