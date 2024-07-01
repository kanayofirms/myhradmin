<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobGradesModel;


class JobGradesController extends Controller
{
    public function index()
    {
        return view('backend.job_grades.list');
    }

    public function add(Request $request)
    {
        return view('backend.job_grades.add');
    }
}
