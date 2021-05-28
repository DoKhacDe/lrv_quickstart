<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function register() 
    {
        return view('auth.register');
    }

    public function save(RegisterRequest $request) 
    {

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();
        if ($save) {
            return back()->with('success', 'New User has been successfully added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
}
