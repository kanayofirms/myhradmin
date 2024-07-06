<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CountriesModel;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = CountriesModel::all();
    }
}
