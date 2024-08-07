<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Request;

class JobHistoryModel extends Model
{
    use HasFactory;

    protected $table = 'job_history';

    static public function getRecord($request)
    {
        // $return = self::select('job_history.*')
        //     ->orderBy('id', 'desc')
        //     ->paginate(20);
        // return $return;

        $return = self::select(
            'job_history.*',
            'users.name',
            'jobs.job_title',
            'users.last_name',
            'departments.department_name'
        )
            ->join('users', 'users.id', '=', 'job_history.employee_id')
            ->join('jobs', 'jobs.id', '=', 'job_history.job_id')
            ->join('departments', 'departments.id', '=', 'job_history.department_id')
            ->orderBy('job_history.id', 'desc');

        // Search Start

        if (!empty(Request::get('id'))) {
            $return = $return->where('job_history.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('start_date'))) {
            $return = $return->where(
                'job_history.start_date',
                '=',
                Request::get(
                    'start_date'
                )
            );

        }

        if (!empty(Request::get('end_date'))) {
            $return = $return->where('job_history.end_date', '=', Request::get('end_date'));

        }

        if (!empty(Request::get('job_title'))) {
            $return = $return->where('jobs.job_title', 'like', '%' . Request::get('job_title') . '%');
        }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('job_history.start_date', '>=', Request::get('start_date'))->where('job_history.end_date', '<=', Request::get('end_date'));
        }

        // Search End

        $return = $return->paginate(20);
        return $return;
    }

    public function get_user_name_single()
    {
        return $this->belongsTo(User::class, "employee_id");
    }

    public function get_job_single()
    {
        return $this->belongsTo(JobsModel::class, 'job_id');
    }

    public function get_departments_name_single()
    {
        return $this->belongsTo(DepartmentsModel::class, 'department_id');
    }
}
