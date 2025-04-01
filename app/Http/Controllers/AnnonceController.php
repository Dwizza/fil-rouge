<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Http\Requests\StoreannonceRequest;
use App\Http\Requests\UpdateannonceRequest;
use App\Models\Category;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard Entreprise.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard entreprise.AddAnnonce', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreannonceRequest $request)
    {
        $validate = $request->validated([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'user_id' => auth()->id(),
            'category_id' => 'required',
            'location' => 'required|string',
            'image' => 'required|image',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validate['image'] = $imageName;
        }

        Annonce::create($validate);

        return redirect()->route('addannonce')
            ->with('success', 'annonce created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(annonce $annonce)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(annonce $annonce)
    {
        return view('Particulier & entreprise View.EditAnnonce', compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateannonceRequest $request, annonce $annonce)
    {
        $validate = $request->validated([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'location' => 'required|string',
            'image' => 'nullable|image',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validate['image'] = $imageName;
        }

        $annonce->update($validate);

        return redirect()->route('addannonce')->with('success', 'annonce updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(annonce $annonce)
    {
        $annonce->delete();

        return redirect()->route('addannonce')
            ->with('success', 'annonce deleted successfully.');
    }
}
