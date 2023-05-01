<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class StudentsExport implements FromCollection , WithHeadings , WithStyles
{
    protected $gradeId;
    protected $classroomId;


    public function __construct($gradeId = null, $classroomId = null)
    {
        $this->gradeId = $gradeId;
        $this->classroomId = $classroomId;

    }


    public function collection() : Collection
    {
        $query = Student::query()->with(['parent', 'classroom', 'grade', 'nationality', 'religion', 'blood_type', 'gender']);

        if ($this->gradeId && $this->gradeId !== 'AllGrades') {
            $query->where('grade_id', $this->gradeId);
        }

        if ($this->classroomId && $this->classroomId !== 'AllClassrooms')  {
            $query->where('classroom_id', $this->classroomId);
        }


        $students = $query->get();

        $data = [];

        foreach ($students as $index => $student) {
            $data[] = [
                'Number' => $index + 1,
                'Name' => $student->name,
                'Grade' => $student->grade->name,
                'Classroom' => $student->classroom->name,
                'Gender' => $student->gender->name,
                'Nationality' => $student->nationality->name,
                'Religion' => $student->religion->name,
                'Academic Year' => $student->academic_year,
                'Date of Birth' => $student->date_birth,
                'Blood Type' => $student->blood_type->name,
                'Father Name' => $student->parent->Name_Father,
                'Mother Name' => $student->parent->Name_Mother,
                'Created At' => $student->created_at->format('Y-m-d'),
                'Updated At' => $student->updated_at->format('Y-m-d'),
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            trans('main.number'),
            trans('main.name'),
            trans('main.grade'),
            trans('main.classroom'),
            trans('main.gender'),
            trans('main.nationality'),
            trans('main.religion'),
            trans('main.academic-year'),
            trans('main.date-birth'),
            trans('main.blood-type'),
            trans('main.father-name'),
            trans('main.mother-name'),
            trans('main.created_at'),
            trans('main.updated-at'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->setRightToLeft(true);
        // Apply the styles to the sheet
        $sheet->getStyle('A1:M1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => '008DB9'],
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
        ]);

        $sheet->getStyle('A1:M1')->getBorders()->getAllBorders()->setBorderStyle('thin');
        $sheet->getStyle('A2:M' . (count($this->collection()) + 1))->getBorders()->getAllBorders()->setBorderStyle('thin');

        $sheet->getStyle('A1:M1')->getAlignment()->setWrapText(true);

        return [
            // Style the header row
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => '008DB9'],
                ],
                'alignment' => [
                    'horizontal' => 'center',
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => 'thin',
                    ],
                ],
            ],


        ];
    }


}
