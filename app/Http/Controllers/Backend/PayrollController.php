<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModelsPayrollModel;
use App\Models\User;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.payroll.list');
    }

    public function add(Request $request)
    {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        return view('backend.payroll.add', $data);
    }
}
