<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class JobsModel extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    static public function getRecord($request)
    {
        // $return = self::select('jobs.*')
        //         ->orderBy('id', 'desc')
        //         ->paginate(20);

        //         return $return;
        $return = self::select('jobs.*');

        //search box start
        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }

        if (!empty(Request::get('job_title'))) {
            $return = $return->where('job_title', 'LIKE', '%' . Request::get('job_title') . '%');
        }

        if (!empty(Request::get('min_salary'))) {
            $return = $return->where('min_salary', 'LIKE', '%' . Request::get('min_salary') . '%');
        }

        if (!empty(Request::get('max_salary'))) {
            $return = $return->where('max_salary', 'LIKE', '%' . Request::get('max_salary') . '%');
        }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('jobs.created_at', '>=', Request::get('start_date'))
                ->where('jobs.created_at', '<=', Request::get('end_date'));
        }
        //search box end

        $return = $return->orderBy('id', 'desc')
            ->paginate(20);
        return $return;
    }


}
