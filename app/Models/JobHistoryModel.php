<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class JobHistoryModel extends Model
{
    use HasFactory;

    protected $table = 'job_history';

    static public function getRecord($request)
    {
        $return = self::select('job_history.*')
                ->orderBy('id', 'desc')
                ->paginate(20);
        return $return;
    }


}
