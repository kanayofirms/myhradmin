<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.payroll.list');
    }
}
