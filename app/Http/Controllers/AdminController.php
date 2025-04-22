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
    
    public function users()
    {
        $users = User::with('role')->where('role_id', '!=', '1')->get();
        
    
        return view('admin.users', compact('users'));
    }
    public function annonces(Request $request)
    {
        $search = $request->input('search');
        $query = Annonce::query()->with(['category', 'user']);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('price', 'like', "%{$search}%")
                  ->orWhereHas('category', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  })
                  ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $annonces = $query->paginate(10)->withQueryString();
        // $annonces = annonce::with(['user','category'])->get();
        return view('admin.annonces', compact('annonces','search'));
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
