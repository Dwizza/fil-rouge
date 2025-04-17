<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\annonce;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function users()
    {
        $users = User::with('role')->where('role_id', '!=', '1')->get();
        
    
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function annonces()
    {
        
        $annonces = annonce::with(['user','category'])->get();
        return view('admin.annonces', compact('annonces'));
    }

    public function dashboard()
    {
        $totalAnnonces = Annonce::count();
        $totalEntreprises = User::where('role_id', '=', '2')->count();
        $totalParticuliers = User::where('role_id', '=', '3')->count();
        // dd($totalAnnonces, $totalEntreprises, $totalParticuliers);

        // Tqdr tzid plus dyal stats...

        return view('admin.index', compact('totalAnnonces','totalEntreprises','totalParticuliers'));
        
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreadminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminRequest $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:draft,published,archived'
    ]);

    $annonce = Annonce::findOrFail($id);
    $annonce->status = $request->status;
    $annonce->save();

    return redirect()->back()->with('success', 'Status updated!');
}

}
