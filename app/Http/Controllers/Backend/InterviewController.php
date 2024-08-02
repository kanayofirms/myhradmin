<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class InterviewController extends Controller
{
    public function Interview(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('backend.employee.interview.list', $data);
    }
}
