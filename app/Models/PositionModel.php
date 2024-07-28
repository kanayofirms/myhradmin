<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionModel extends Model
{
    use HasFactory;

    protected $table = 'position';

    static public function getRecord($request)
    {
        $return = self::select('position.*')
            ->orderBy('id', 'desc');
        $return = $return->paginate(2);

        return $return;
    }
}
