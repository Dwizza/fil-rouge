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
            if(auth()->user()->role_id == 1){
            return redirect('/admin');
            }else if(auth()->user()->role_id == 2){
            return redirect('/company');
            }else{
            return redirect('/');
            }
        }
        return redirect('/login')->with('error', 'Invalid login credentials');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,webp,jpg,gif|max:10240',
            'phone' => 'required',
            'address' => 'required',
            'role_id' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $imageName = time() . '-' . uniqid() . '.' . $extension;
            $file->storeAs('uploads/users', $imageName, 'public');
            $imagePath = 'uploads/users/' . $imageName;
            $validate['photo'] = $imagePath;
        } else {
            $validate['photo'] = null; 
        }
        // uploads\users\1744473349.png
        // dd($validate);
        
        User::create($validate)->save();
        // if($request['role'] == 1){
            return redirect('/login');
        // }else if($request['role'] == 2){
        //     return redirect('/login');
        // }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
