<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class LocationsModel extends Model
{
    use HasFactory;

    protected $table = 'locations';

    static public function getRecord($request)
    {
        $return = self::select('locations.*')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return $return;
    }
}
