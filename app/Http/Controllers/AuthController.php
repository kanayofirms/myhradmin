<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\ForgotPasswordMail;
use Str;
use Auth;
use Mail;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }

    public function forgot_password(Request $request)
    {
        return view('forgot_password');
    }

    public function forgot_password_post(Request $request)
    {
        // dd($request->all());
        $count = User::where('email', '=', $request->email)->count();
        if ($count > 0) {
            $user = User::where('email', '=', $request->email)->first();

            $random_password = rand(111111, 999999);

            $user->password = Hash::make($random_password);
            $user->save();

            $user->random_password = $random_password;

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', "Password has been sent to email");

        } else {
            return redirect()->back()->with('error', "Email Not Found");
        }
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function register_post(Request $request)
    {
        // dd($request->all());
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);


        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', 'Register Successfully.');
    }

    public function CheckEmail(Request $request)
    {
        $email = $request->input('email');
        $isExists = User::where('email', $email)->first();
        if ($isExists) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::User()->is_role == "1") {
                return redirect()->intended('admin/dashboard');
            } else if (Auth::user()->is_role == "0") {
                return redirect()->intended('employee/dashboard');
            } {
                return redirect('/')->with('error', 'No HR available... Please check');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter the correct credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
