<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function register() 
    {
        return view('auth.register');
    }

    public function createAdmin(RegisterRequest $request) 
    {   
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $admin = Admin::create($input);
        if ($admin) {
            return back()->with('success', __('content.New User has been successfully added to database!'));
        } else {
            return back()->with('fail', __('content.Something went wrong, try again later'));
        }
    }

    public function login() 
    {
        return view('auth.login');
    }

    public function checkLogin(LoginRequest $request) 
    {   
        $email = $request->email;
        $admin = Admin::where('email', $email)->first();
        if ($admin) {
            $password = $admin->password;
            if (Hash::check($request->password, $password)){
                $request->session()->put('LoggedUser', $admin->id);
                return redirect()->route('todolist.index');
            } else {
                return back()->with('fail', __('content.Incorrect password'));
            }
        }
    }

    public function index() 
    {
        return view('todolist.index');
    }
}
