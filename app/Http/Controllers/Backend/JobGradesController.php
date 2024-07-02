<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobGradesModel;


class JobGradesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobGradesModel::getRecord($request);
        return view('backend.job_grades.list');
    }

    public function add(Request $request)
    {
        return view('backend.job_grades.add');
    }

    public function add_post(Request $request)
    {
        // dd($request->all());
        $user = request()->validate([
            'grade_level' => 'required',
            'lowest_sal' => 'required',
            'highest_sal' => 'required'
        ]);


        $user = new JobGradesModel;
        $user->grade_level = trim($request->grade_level);
        $user->lowest_sal = trim($request->lowest_sal);
        $user->highest_sal = trim($request->highest_sal);
        $user->save();

        return redirect('admin/job_grades')->with('success', 'Job grades successfully added.');
    }
}
