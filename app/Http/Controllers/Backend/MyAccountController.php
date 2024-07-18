<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class MyAccountController extends Controller
{
    public function my_account(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view("backend.my_account.update", $data);
    }

    public function edit_update(Request $request)
    {
        // dd($request->all());

        $user = request()->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            $user->password = trim($request->password);
        }
        $user->save();

        return redirect('admin/my_account')->with('success', 'My Account Successfully Upated!');
    }
}
