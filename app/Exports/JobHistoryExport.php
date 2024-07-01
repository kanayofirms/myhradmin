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
        return [
            $user->id,
            $user->name . ' ' . $user->last_name
        ];
    }

    public function headings(): array
    {
        return [
            'Table ID',
            'Employee Name'
        ];
    }
}
