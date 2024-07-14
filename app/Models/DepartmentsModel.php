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

        $return = $return->paginate(20);

        return $return;
    }

}
