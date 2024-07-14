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
        $return = self::select('departments.*')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return $return;
    }

}
