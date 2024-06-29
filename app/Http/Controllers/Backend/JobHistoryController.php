<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobsModel;


class JobHistoryController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.job_history.list');
    }
}
