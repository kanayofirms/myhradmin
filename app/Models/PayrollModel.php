<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollModel extends Model
{
    use HasFactory;

    protected $table = 'payroll';

    static public function getRecord()
    {
        $return = self::select('payroll.*', 'users.name')
            ->join('users', 'users.id', '=', 'payroll.employee_id')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return $return;
    }
}
