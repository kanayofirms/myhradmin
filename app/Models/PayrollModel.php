<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PayrollModel extends Model
{
    use HasFactory;

    protected $table = 'payroll';

    static public function getRecord($request)
    {
        $return = self::select('payroll.*', 'users.name')
            ->join('users', 'users.id', '=', 'payroll.employee_id')
            ->orderBy('id', 'desc');

        //Search work start
        if (!empty(Request::get('id'))) {
            $return = $return->where('payroll.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('employee_id'))) {
            $return = $return->where('users.name', 'LIKE', '%' . Request::get('employee_id') . '%');
        }

        if (!empty(Request::get('number_of_days_worked'))) {
            $return = $return->where('payroll.number_of_days_worked', 'LIKE', '%' . Request::get('number_of_days_worked') . '%');
        }

        if (!empty(Request::get('bonus'))) {
            $return = $return->where('payroll.bonus', 'LIKE', '%' . Request::get('bonus') . '%');
        }

        if (!empty(Request::get('overtime'))) {
            $return = $return->where('payroll.overtime', 'LIKE', '%' . Request::get('overtime') . '%');
        }

        // if (!empty(Request::get('gross_salary'))) {
        //     $return = $return->where('payroll.gross_salary', 'LIKE', '%' . Request::get('gross_salary') . '%');
        // }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('payroll.created_at', '>=', Request::get('start_date'))
                ->where('payroll.created_at', '<=', Request::get('end_date'));
        }

        //Search work stop
        $return = $return->paginate(20);
        return $return;
    }

    public function get_employee_name()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
