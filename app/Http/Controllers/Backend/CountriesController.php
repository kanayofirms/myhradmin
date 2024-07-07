<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CountriesModel;
use Illuminate\Http\Request;
use App\Models\RegionsModel;

class CountriesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = CountriesModel::getRecord($request);
        return view('backend.countries.list', $data);
    }

    public function add(Request $request)
    {
        $data['getRegions'] = RegionsModel::get();
        return view('backend.countries.add', $data);
    }

    public function add_post(Request $request)
    {
        $insertData = request()->validate([
            'country_name' => 'required',
            'regions_id' => 'required'
        ]);

        $insertData = new CountriesModel;
        $insertData->country_name = $request->country_name;
        $insertData->regions_id = $request->regions_id;
        $insertData->save();

        return redirect('admin/countries')->with('success', 'Countries successfully added.');
    }

    public function edit($id)
    {
        $data['getRecord'] = CountriesModel::find($id);
        $data['getRegions'] = RegionsModel::get();
        return view('backend.countries.edit', $data);
    }

    public function edit_update(Request $request, $id)
    {
        $updateData = request()->validate([
            'country_name' => 'required',
            'regions_id' => 'required'
        ]);

        $updateData = RegionsModel::finc($id);
        $updateData->country_name = $request->country_name;
        $updateData->regions_id = $request->regions_id;

        $updateData->save();

        return redirect('admin/countries')->with('success', 'Countries successfully updated.');
    }
}
