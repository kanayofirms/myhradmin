<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.position.list');
    }

    public function add(Request $request)
    {
        return view('backend.position.add');
    }
}
