<?php

namespace App\Exports;

use App\Models\PayrollModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Request;


class PayrollExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return PayrollModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        $createdAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
        $updatedAtFormat = date('d-m-Y H:i A', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->name,
            $user->number_of_days_worked,
            $user->bonus,
            $user->overtime,
            $user->gross_salary,
            $user->cash_advance,
            $user->late_hours,
            $user->absent_days,
            $user->sss_contribution,
            $user->insure_health,
            $user->total_deduction,
            $user->net_pay,
            $user->payroll_monthly,
            $createdAtFormat,
            $updatedAtFormat
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Employee Name',
            'Days Worked',
            'Bonus',
            'Overtime',
            'Gross Salary',
            'Cash Advance',
            'Late Hours',
            'Absent Days',
            'SSS Contribution',
            'Health Insurance',
            'Total Deduction',
            'Net Pay',
            'Payroll Monthly',
            'Created At',
            'Updated At'
        ];
    }

}

