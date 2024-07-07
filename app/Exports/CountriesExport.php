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
        return [
            $user->id
        ];
    }

    public function headings(): array
    {
        return [
            'Table ID'
        ];
    }
}
