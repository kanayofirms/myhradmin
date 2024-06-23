<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;


class JobsController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.jobs.list');
    }
}
