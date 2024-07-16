<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ManagerModel extends Model
{
    use HasFactory;

    protected $table = "manager";

    static public function getRecord($request)
    {
        // $return = self::select('manager.*')
        //     ->orderBy('id', 'desc')
        //     ->paginate(20);

        // return $return;

        $return = self::select('manager.*');

        //search box start
        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }

        if (!empty(Request::get('manager_name'))) {
            $return = $return->where('manager_name', 'LIKE', '%' . Request::get('manager_name') . '%');
        }

        if (!empty(Request::get('manager_email'))) {
            $return = $return->where('manager_email', 'LIKE', '%' . Request::get('manager_email') . '%');
        }

        if (!empty(Request::get('manager_phone'))) {
            $return = $return->where('manager_phone', 'LIKE', '%' . Request::get('manager_phone') . '%');
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
