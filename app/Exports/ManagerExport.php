<?php

namespace App\Exports;

use App\Models\ManagerModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Request;


class ManagerExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return ManagerModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        $createdAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
        return [
            ++$this->index,
            $user->id,
            $user->manager_name,
            $user->manager_email,
            $user->manager_phone,
            $createdAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Manager Name',
            'Manager Email',
            'Manager Phone',
            'Created At'
        ];
    }

}

