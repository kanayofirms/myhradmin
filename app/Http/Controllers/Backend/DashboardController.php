<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $data['getEmployeesCount'] = User::count();
        return view('backend.dashboard.list', $data);
    }
}

