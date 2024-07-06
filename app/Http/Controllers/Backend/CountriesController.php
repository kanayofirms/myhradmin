<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CountriesModel;
use Illuminate\Http\Request;
use App\Models\RegionsModel;

class CountriesController extends Controller
{
    public function index()
    {
        return view('backend.countries.list');
    }

    public function add(Request $request)
    {
        $data['getCountries'] = RegionsModel::get();
        return view('backend.countries.add', $data);
    }


}
