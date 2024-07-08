<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationsController extends Controller
{
    public function index()
    {
        return view("backend.locations.list");
    }
}
