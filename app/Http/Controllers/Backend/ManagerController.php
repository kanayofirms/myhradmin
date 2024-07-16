<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ManagerController extends Controller
{
    public function index(Request $request)
    {
        return view("backend.manager.list");
    }
}
