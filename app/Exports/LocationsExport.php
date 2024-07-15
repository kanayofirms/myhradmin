<?php

namespace App\Exports;

use App\Models\LocationsModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Request;


class LocationsExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return LocationsModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        $createdAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
        return [
            ++$this->index,
            $user->id,
            $user->street_address,
            $user->postal_code,
            $user->city,
            $user->state_province,
            $user->country_name,
            $createdAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Street Address',
            'Postal Code',
            'City',
            'State/Province',
            'Country',
            'Created At',
        ];
    }

}

