<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterviewController extends Controller
{
    public function Interview(Request $request)
    {
        return view('backend.employee.interview.list');
    }
}
