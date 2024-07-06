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
        $return = self::select('countries.*');

        $return = $return->orderBy('id', 'desc')
            ->paginate(20);
        return $return;
    }
}
