<?php

namespace App\Exports;
use App\Models\JobsModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Request;

class JobsExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings {
    public function collection() {
        $request = Request::all();
        return JobsModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array {
        return [
            ++ $this->index,
        ];
        }

        public function headings(): array {
            return [
                'S.No',
            ];
        }

}

