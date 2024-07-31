<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobsModel;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $data['getEmployeesCount'] = User::count();
        $data['getHRCount'] = User::where('is_role', '=', 1)->count();
        $data['getEMPCount'] = User::where('is_role', '=', 0)->count();

        $data['getTotalJobCount'] = JobsModel::count();
        return view('backend.dashboard.list', $data);
    }
}

