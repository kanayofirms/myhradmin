<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class DepartmentsModel extends Model
{
    use HasFactory;

    protected $table = "departments";

    static public function getRecord($request)
    {
        // $return = self::select('departments.*')
        //     ->orderBy('id', 'desc')
        //     ->paginate(20);

        // return $return;

        $return = self::select('departments.*', 'locations.street_address')
            ->join('locations', 'locations.id', '=', 'departments.locations_id')
            ->orderBy('id', 'desc');

        // Search Start
        if (!empty(Request::get('id'))) {
            $return = $return->where('departments.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('department_name'))) {
            $return = $return->where('departments.department_name', 'like', '%' . Request::get('department_name') . '%');
        }

        if (!empty(Request::get('street_address'))) {
            $return = $return->where('locations.street_address', 'like', '%' . Request::get('street_address') . '%');
        }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('departments.created_at', '>=', Request::get('start_date'))
                ->where('departments.created_at', '<=', Request::get('end_date'));
        }

        //Search End

        $return = $return->paginate(20);

        return $return;
    }

}
