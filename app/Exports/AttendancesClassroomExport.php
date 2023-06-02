<?php

namespace App\Exports;

use App\Models\Attendances;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;



class AttendancesClassroomExport implements FromCollection , WithHeadings , WithStyles
{
    protected $gradeId;
    protected $classroomId;
    protected $date;


    public function __construct($gradeId = null, $classroomId = null,$date = null)
    {
        $this->gradeId = $gradeId;
        $this->classroomId = $classroomId;
        $this->date = $date;

    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection() : Collection
    {
        $query = Attendances::query()->with(['student', 'classroom', 'grade','teacher']);

        if ($this->date) {
            $query->where('attendence_date', $this->date);
        }
        if ($this->gradeId) {
            $query->where('grade_id', $this->gradeId);
        }

        if ($this->classroomId)  {
            $query->where('classroom_id', $this->classroomId);
        }


        $attendanceStudents = $query->get();

        $data = [];

        foreach ($attendanceStudents as $index => $attendanceStudent) {
            $data[] = [
                'Number' => $index + 1,
                'Student Name' => $attendanceStudent->student->name,
                'Grade' => $attendanceStudent->grade->name,
                'Classroom' => $attendanceStudent->classroom->name,
                'Attendence Date' => $attendanceStudent->attendence_date,
                'Status' => $attendanceStudent->attendence_status ?  trans('main.presence')  : trans('main.absent'),
                "Teacher Name" => $attendanceStudent->teacher_id ? $attendanceStudent->teacher->teacher_name : null,
                'Created At' => $attendanceStudent->created_at->format('Y-m-d'),
                'Updated At' => $attendanceStudent->updated_at->format('Y-m-d'),
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            trans('main.number'),
            trans('main.studentname'),
            trans('main.grade'),
            trans('main.classroom'),
            trans('main.attendence-date'),
            trans('main.attendence-status'),
            trans('main.teacher-name'),
            trans('main.created_at'),
            trans('main.updated-at'),
        ];
    }



    public function styles(Worksheet $sheet)
    {
        $sheet->setRightToLeft(true);

        // Header row style
        $sheet->getStyle('A1:I1')->applyFromArray([
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
        ]);

        // Data row style
        $sheet->getStyle('A2:I' . ($this->collection()->count() + 1))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                ],
            ],
        ]);

        $sheet->getStyle('A1:I1')->getAlignment()->setWrapText(true);

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
