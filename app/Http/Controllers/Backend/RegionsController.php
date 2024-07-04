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

    public function add(Request $request)
    {
        return view('backend.regions.add');
    }

    public function add_post(Request $request)
    {
        $user = request()->validate([
            'region_name' => 'required'
        ]);

        $user = new RegionsModel;
        $user->region_name = trim($request->region_name);

        $user->save();

        return redirect('admin/regions')->with('success', 'Regions successfully added.');
    }

    public function edit(Request $request, $id)
    {
        $data['getRecord'] = RegionsModel::getRecord($id);
        return view('backend.regions.edit', $data);
    }
}
