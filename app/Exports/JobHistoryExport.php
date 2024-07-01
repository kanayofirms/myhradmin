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

}
