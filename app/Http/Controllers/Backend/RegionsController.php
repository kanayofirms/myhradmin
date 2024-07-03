<?php

namespace App\Http\Controllers\Backend;

use App\Models\RegionsModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = RegionsModel::getRecord($request);
        return view('backend.regions.list', $data);
    }
}
