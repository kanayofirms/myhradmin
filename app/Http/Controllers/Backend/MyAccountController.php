<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MyAccountController extends Controller
{
    public function my_account(Request $request)
    {
        return view("backend.my_account.update");
    }
}
