<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(auth()->attempt($user)){
            return redirect('/');
        }
        return redirect('/login')->with('error', 'Invalid login credentials');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);
        
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'role_id' => $request['role'],
        ]);
        if($request['role'] == 1){
            return redirect('/login');
        }else{
            return redirect('/entreprise');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
