<?php

namespace App\Exports;

use App\Models\DepartmentsModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Request;


class DepartmentsExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return DepartmentsModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        $createdAtFormat = date('d-m-Y', strtotime($user->created_at));
        return [
            ++$this->index,
            $user->id,
            $user->department_name,
            $user->manager_id,
            $user->locations_id,
            $createdAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Department Name',
            'Manager Name',
            'Locations Name',
            'Created At'
        ];
    }

}

