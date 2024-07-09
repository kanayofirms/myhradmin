<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CountriesModel;

class LocationsController extends Controller
{
    public function index()
    {
        return view("backend.locations.list");
    }

    public function add(Request $request)
    {
        $data['getCountries'] = CountriesModel::get();
        return view("backend.locations.add", $data);
    }
}
