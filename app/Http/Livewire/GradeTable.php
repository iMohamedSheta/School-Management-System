<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use App\Models\grade;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Livewire\Redirector;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};


final class GradeTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public $name;
    public $notes;




    public function setUp(): array
    {
        $this->showCheckBox();


        return [

            Header::make()->showSearchInput()
            ->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\grade>
    */
    public function datasource(): Builder
    {
        return grade::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')

           /** Example of custom column using a closure **/
            ->addColumn('name_lower', function (grade $model) {
                return strtolower(e($model->name));
            })

            ->addColumn('notes',fn(grade $model) => Str::words(e($model ->notes)))
            ->addColumn('created_at_formatted', fn (grade $model) => Carbon::parse($model->created_at)->format('d-m-Y'))
            ->addColumn('updated_at_formatted', fn (grade $model) => Carbon::parse($model->updated_at)->diffForHumans());
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [

            Column::make('ID', 'id')
                ->makeInputRange()
                ->hidden(true,false)
                ->withCount("Num"),


            Column::make('NAME', 'name')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->editOnClick(),

            Column::make('NOTES', 'notes')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->editOnClick(),


            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker()
                ->hidden(true,false),

            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker()
                ->hidden(true,false),


        ]
;
    }

    public function header(): array
    {
        return [
            Button::add('bulk-sold-out')
                ->class('btn btn-dark my-1 inline-block fa-regular fa-trash-can')
                ->emit('bulkDeleteAllEvent', [])
        ];
    }

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(), [
                'bulkDeleteAllEvent',
            ]);
    }




    public function bulkDeleteAllEvent(): Redirector
    {
        // Get the selected grade IDs from the checkbox values
        $selectedIds = $this->checkboxValues;

        // If no grades were selected, show an error message and redirect to the grade page
        if (count($selectedIds) == 0) {
            // $this->dispatchBrowserEvent('showAlert', ['message' => trans('alert.errorselect')]);
            return Redirect::route('grade')->with("error",trans('alert.errorselect'));
        }

        // Initialize an array to store the IDs of the grades that can be deleted
        $idsToDelete = [];

        // Initialize an empty string to store the names of the grades that can't be deleted
        $namesOfGradesWithClassrooms = '';

        // Loop through the selected grades and check if they have classrooms
        foreach ($selectedIds as $id) {
            $grade = Grade::find($id);

            // If the grade doesn't have classrooms, add its ID to the $idsToDelete array
            if (!$grade->classrooms()->exists()) {
                $idsToDelete[] = $id;
            } else {
                // If the grade has classrooms, add its name to the $namesOfGradesWithClassrooms string
                $namesOfGradesWithClassrooms .= $grade->name . ', ';
            }
        }

        // Delete the grades that don't have classrooms
        if (count($idsToDelete) > 0) {
            Grade::destroy($idsToDelete);

            // Check if there is Selected Grades with Classrooms
            if(!empty($namesOfGradesWithClassrooms))
            {
                // Return Success message with Error message if there is some grades deleted and some are not.
                $errorMsg = trans('alert.cantdeletedgrades') . ': ' . $namesOfGradesWithClassrooms;
                return Redirect::route('grade')->with('success', trans('alert.deletedselected'))->with('error', $errorMsg);
            }
            return Redirect::route('grade')->with('success', trans('alert.deletedselected'));
        }

        // If no grades were deleted, show an error message and redirect to the grade page
        if (!empty($namesOfGradesWithClassrooms)) {
            // Remove the last comma and space from the $namesOfGradesWithClassrooms string
            $namesOfGradesWithClassrooms = substr($namesOfGradesWithClassrooms, 0, -2);

            $errorMsg = trans('alert.cantdeletedgrades') . ': ' . $namesOfGradesWithClassrooms;
            return Redirect::route('grade')->with('error', $errorMsg);
        }

        // If there were no grades with classrooms, show a general error message and redirect to the grade page
        return Redirect::route('grade')->with('error', trans('alert.gradehasclassrooms'));
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid grade Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
        //    Button::make('edit', 'Edit')
        //        ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
        //        ->route('grade.edit',['id'])
        //        ->openModal(),
            Button::make('destroy', 'Delete')
                ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm ')
                ->target('_self')
                ->route('grade.destroy', ['id'])
                ->method('delete')


        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid grade Action Rules.
     *
     * @return array<int, RuleActions>
     */


    // public function actionRules(): array
    // {
    //    return [

    //        //Hide button edit for ID 1
    //         Rule::button('edit')
    //             ->when(fn($grade) => $grade->id === 1)
    //             ->hide(),
    //     ];
    // }


    public function onUpdatedEditable(string $id, string $field, string $value): void
{
    try {
    $updated = grade::query()->findOrFail($id)->update([
        $field => $value,
    ]);} catch (QueryException $exception) {

        $updated = false;
    }

    // Reload data after a successful update
    if ($updated) {
        $this->fillData($updated);
    }

}

}
