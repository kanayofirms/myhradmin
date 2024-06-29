<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobsModel;
use App\Models\User;
use App\Models\JobHistoryModel;




class JobHistoryController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.job_history.list');
    }

    public function add()
    {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        $data['getJobs'] = JobsModel::get();
        return view('backend.job_history.add', $data);
    }
}
