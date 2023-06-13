<?php

namespace App\Http\Controllers\SchoolSettings;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicYearController extends Controller
{
    //
    public function index()
    {
        return view('academic_year.acadenic-year');
    }

    public function deleteSelected(Request $request)
    {
        $academicyearIds = array_filter(explode(',', $request->selected_ids));

        $successCount = $this->deleteAcademicYears($academicyearIds);

        if ($successCount == count($academicyearIds) && $successCount > 0) {
            return redirect()->back()->with('success', trans('alert.selected-academic-years-deleted'));
        }

        return redirect()->back()->with('error', trans('alert.error'));
    }


    private function deleteAcademicYears(array $academicyearIds): int
    {
        $successCount = 0;
        DB::beginTransaction();

        try {
            foreach ($academicyearIds as $academicyearId) {
                $successCount += $this->deleteAcademicYear($academicyearId);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', trans('alert.error'));
        }

        return $successCount;
    }

    private function deleteAcademicYear(int $academicyearId): int
    {
        try {
            $academicyear = AcademicYear::findOrFail($academicyearId);
            if ($academicyear->delete()) {
                return 1;
            }
        } catch (ModelNotFoundException $e) {
            // Handle the case when the academic year is not found by ID
            // Log an error, display a message, or perform other actions
            return redirect()->back()->with('error', trans('alert.error'));
        }

        return 0;
    }
}
