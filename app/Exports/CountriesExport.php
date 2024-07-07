<?php

namespace App\Exports;

use App\Models\CountriesModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Request;

class CountriesExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return CountriesModel::getRecord($request);
    }

    protected $index = 0;
    public function map($user): array
    {
        $CreatedAtFormat = date('d-m-Y', strtotime($user->created_at));
        return [
            ++$this->index,
            $user->id,
            $user->country_name,
            $user->region_name,
            $CreatedAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Country Name',
            'Region Name',
            'Created At'
        ];
    }
}
