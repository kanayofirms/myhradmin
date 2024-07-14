<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobGradesModel;
use Illuminate\Http\Request;



class JobGradesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobGradesModel::getRecord($request);
        return view('backend.job_grades.list', $data);
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

    public function edit($id, Request $request)
    {
        $data['getRecord'] = JobGradesModel::find($id);
        return view('backend.job_grades.edit', $data);
    }

    public function edit_update(Request $request, $id)
    {
        $user = JobGradesModel::find($id);

        $user->grade_level = trim($request->grade_level);
        $user->lowest_sal = trim($request->lowest_sal);
        $user->highest_sal = trim($request->highest_sal);
        $user->save();

        return redirect('admin/job_grades')->with('success', 'Job Grades successfully updated.');
    }

    public function delete($id)
    {
        $user = JobGradesModel::find($id);
        $user->delete();

        return redirect()->back()->with('error', 'Record successfully deleted.');
    }
}
