<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CountriesModel;
use App\Models\DepartmentsModel;
use App\Models\JobsModel;
use App\Models\LocationsModel;
use App\Models\ManagerModel;
use App\Models\PayrollModel;
use App\Models\PositionModel;
use App\Models\RegionsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobHistoryModel;
use Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        if (Auth::user()->is_role == 1) {
            $data['getEmployeesCount'] = User::count();
            $data['getHRCount'] = User::where('is_role', '=', 1)->count();
            $data['getEMPCount'] = User::where('is_role', '=', 0)->count();

            $data['getTotalJobCount'] = JobsModel::count();
            $data['getJobHistoryCount'] = JobHistoryModel::count();
            $data['getRegionsCount'] = RegionsModel::count();
            $data['TodayRegion'] = RegionsModel::whereDate('created_at', Carbon::today())->count();
            $data['YesterdayRegion'] = RegionsModel::whereDate('created_at', Carbon::yesterday())->count();
            $data['getCountriesCount'] = CountriesModel::count();
            $data['getLocationsCount'] = LocationsModel::count();
            $data['getDepartmentsCount'] = DepartmentsModel::count();
            $data['getManagerCount'] = ManagerModel::count();
            $data['GetPayrollCount'] = PayrollModel::count();
            $data['GetPositionCount'] = PositionModel::count();

            return view('backend.dashboard.list', $data);
        } else if (Auth::user()->is_role == 0) {
            return view('backend.employee.dashboard.list');
        }
    }
}

