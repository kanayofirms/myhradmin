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
        $return = self::select('manager.*')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return $return;
    }
}
