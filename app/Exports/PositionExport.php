<?php

namespace App\Exports;

use App\Models\PositionModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Request;


class PositionExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return PositionModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        $createdAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
        $updatedAtFormat = date('d-m-Y H:i A', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->position_name,
            $user->daily_rate,
            $user->monthly_rate,
            $user->working_days_per_month,
            $createdAtFormat,
            $updatedAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Position Name',
            'Daily Rate',
            'Monthly Rate',
            'Working Days Per Month',
            'Created At',
            'Updated At'
        ];
    }

}

