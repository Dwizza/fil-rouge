<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Http\Requests\StoreannonceRequest;
use App\Http\Requests\UpdateannonceRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard Entreprise.index');
    }

    // annonces user

    public function userAnnonces()
    {
        $annonces = annonce::where('user_id', auth()->id())->get();
        return view('dashboard entreprise.allAnnonces', compact('annonces'));
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
    public function store(Request $request)
    {
        // dd(auth()->id());
       
        // dd($validate);
        // if ($request->hasFile('image')) {
        //     $images = $request->file('image');
        //     $imagePaths = [];
            
        //     foreach ($images as $image) {
        //         $imageName = time() . '-' . uniqid() . '.' . $image->extension();
        //         $image->move(public_path('images'), $imageName);
        //         $imagePaths[] = 'images/' . $imageName;
        //     }
        //     $validate['image'] = implode(',', $imagePaths);
        //     // dd($imageName);
        // } else {
        //     $validate['image'] = null; 
        // }
        $validate = array_merge(
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'category_id' => 'required',
                'location' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,webp,jpg,gif|max:10240',
                // 'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240'
            ]),
            ['user_id' => auth()->id()]
        );
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension(); // ✅ صححنا هنا
            $image->move(public_path('images'), $imageName);
            $validate['image'] = 'images/' . $imageName;
        }
        
        Annonce::create($validate)->save();
        

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
