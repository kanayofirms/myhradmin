<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManagerModel;


class ManagerController extends Controller
{
    public function index(Request $request)
    {
        return view("backend.manager.list");
    }

    public function add(Request $request)
    {
        return view("backend.manager.add");
    }
}
