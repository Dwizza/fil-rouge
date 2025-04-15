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
            $file->storeAs('storage/uploads/users', $imageName, 'public');
            $imagePath = 'storage/uploads/users/' . $imageName;
            $validate['photo'] = $imagePath;
        } else {
            $validate['photo'] = null; 
        }
        
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
    public function profile(){
        $user = User::where('id', auth()->id())->first();
        return view('dashboard entreprise.profile', compact('user'));
    }
    public function editProfile(Request $request)
{
    $user = auth()->user();

    $validatedData = $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'new_password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $validatedData['username'];
    $user->email = $validatedData['email'];
    $user->phone = $validatedData['phone'] ?? null;
    $user->address = $validatedData['address'] ?? null;

    // Check if user entered a new password
    if (!empty($validatedData['new_password'])) {
        $user->password = bcrypt($validatedData['password']);
    }

    $user->save();

    return redirect('/company/profile')->with('success', 'Profile updated successfully.');
}

}
