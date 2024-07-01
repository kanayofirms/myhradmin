<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class JobGradesController extends Controller
{
    public function index()
    {
        return view('backend.job_grades.list');
    }
}
