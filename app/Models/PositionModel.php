<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PositionModel extends Model
{
    use HasFactory;

    protected $table = 'position';

    static public function getRecord($request)
    {
        $return = self::select('position.*')
            ->orderBy('id', 'desc');

        //Search work start
        if (!empty(Request::get('id'))) {
            $return = $return->where('position.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('position_name'))) {
            $return = $return->where('position.position_name', 'LIKE', '%' . Request::get('position_name') . '%');
        }

        if (!empty(Request::get('daily_rate'))) {
            $return = $return->where('position.daily_rate', 'LIKE', '%' . Request::get('daily_rate') . '%');
        }

        if (!empty(Request::get('monthly_rate'))) {
            $return = $return->where('position.monthly_rate', 'LIKE', '%' . Request::get('monthly_rate') . '%');
        }

        if (!empty(Request::get('working_days_per_month'))) {
            $return = $return->where('position.working_days_per_month', 'LIKE', '%' . Request::get('working_days_per_month') . '%');
        }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('position.created_at', '>=', Request::get('start_date'))
                ->where('position.created_at', '<=', Request::get('end_date'));
        }

        $return = $return->paginate(20);

        return $return;
    }
}
