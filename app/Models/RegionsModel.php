<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class RegionsModel extends Model
{
    use HasFactory;

    protected $table = 'regions';

    static public function getRecord($request)
    {
        $return = self::select('regions.*')
            ->orderBy('regions.id', 'desc');

        // search box start
        if (!empty(Request::get('id'))) {
            $return->where('id', '=', Request::get('id'));
        }

        if (!empty(Request::get('region_name'))) {
            $return->where('region_name', 'like', '%' . Request::get('region_name') . '%');
        }


        // search box end

        $return = $return->paginate(20);
        return $return;
    }

}
