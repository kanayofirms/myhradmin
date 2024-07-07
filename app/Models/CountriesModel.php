<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class CountriesModel extends Model
{
    use HasFactory;

    protected $table = 'countries';

    static public function getRecord($request)
    {
        $return = self::select('countries.*')
            ->orderBy('id', 'desc');
        //Search start
        if (!empty(Request::get('id'))) {
            $return = $return->where('countries.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('country_name'))) {
            $return = $return->where('countries.country_name', 'like', '%' . Request::get('country_name') . '%');
        }

        //Search end
        $return = $return->paginate(20);
        return $return;
    }

    public function get_region_name()
    {
        return $this->belongsTo(RegionsModel::class, 'regions_id');
    }
}
