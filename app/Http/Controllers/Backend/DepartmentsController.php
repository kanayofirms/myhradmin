<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DepartmentsModel;

class DepartmentsController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.departments.list');
    }

    public function add(Request $request)
    {
        return view('backend.departments.add');
    }
}
