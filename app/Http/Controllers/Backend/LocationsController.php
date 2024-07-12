<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CountriesModel;
use App\Models\LocationsModel;
use App\Exports\LocationsExport;
use Maatwebsite\Excel\Facades\Excel;



class LocationsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = LocationsModel::getRecord($request);
        return view("backend.locations.list", $data);
    }

    public function add(Request $request)
    {
        $data['getCountries'] = CountriesModel::get();
        return view("backend.locations.add", $data);
    }

    public function add_post(Request $request)
    {
        // dd($request->all());
        $user = request()->validate([
            'street_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'state_province' => 'required',
            'countries_id' => 'required'
        ]);

        $user = new LocationsModel;
        $user->street_address = trim($request->street_address);
        $user->postal_code = trim($request->postal_code);
        $user->city = trim($request->city);
        $user->state_province = trim($request->state_province);
        $user->countries_id = trim($request->countries_id);
        $user->save();

        return redirect('admin/locations')->with('success', 'Locations successfully added.');
    }

    public function edit(Request $request, $id)
    {
        $data['getRecord'] = LocationsModel::find($id);
        $data['getCountries'] = CountriesModel::get();
        return view('backend.locations.edit', $data);
    }

    public function edit_update(Request $request, $id)
    {
        $user = LocationsModel::find($id);
        $user->street_address = trim($request->street_address);
        $user->postal_code = trim($request->postal_code);
        $user->city = trim($request->city);
        $user->state_province = trim($request->state_province);
        $user->countries_id = trim($request->countries_id);
        $user->save();

        return redirect('admin/locations')->with('success', 'Locations successfully Updated.');

    }

    public function delete($id)
    {
        $user = LocationsModel::find($id);
        $user->delete();

        return redirect()->back()->with('error', 'Record successfully deleted.');
    }

    public function locations_export(Request $request)
    {
        return Excel::download(new LocationsExport, 'locations.xlsx');
    }
}
