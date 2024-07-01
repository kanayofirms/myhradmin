<?php

namespace App\Exports;

use App\Models\JobHistoryModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Request;

class JobHistoryExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return JobHistoryModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        $startDate = date('Y-m-d', strtotime($user->start_date));
        $endDate = date('Y-m-d', strtotime($user->end_date));
        $createdAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
        if ($user->department_id == 1) {
            $department = 'Customer Care Department';
        } else {
            $department = 'Sales Department';
        }
        return [
            $user->id,
            $user->name . ' ' . $user->last_name,
            $startDate,
            $endDate,
            $user->job_title,
            $department,
            $createdAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'Table ID',
            'Employee Name',
            'Start Date',
            'End Date',
            'Job Name',
            'Department ID',
            'Created At'
        ];
    }
}
