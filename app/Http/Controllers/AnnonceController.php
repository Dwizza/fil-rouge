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

    public function home()
    {
        $annonces = annonce::all();
        $categories = Category::all();
        // return view('home', compact('annonces', 'categories'));
        return view('particulier.index', compact('annonces', 'categories'));
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
        $validate = array_merge(
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'category_id' => 'required',
                'location' => 'required|string',
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,webp,jpg,gif|max:10240'
            ]),
            ['user_id' => auth()->id()]
        );
        // dd('dazt');

        
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $imagePaths = [];
            foreach ($images as $image) {
                $imageName = time() . '-' . uniqid() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }
            $validate['image'] = implode(',', $imagePaths);
        } else {
            $validate['image'] = null; 
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
        $categori = Category::where('id', '=', $annonce->category_id)->get();
        $categories = Category::where('id', '!=', $categori[0]->id)->get();
        return view('dashboard entreprise.editannonce',compact('annonce', 'categories', 'categori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $annonce = Annonce::findOrFail($id);

    // 1. Get remaining old images
    $remaining = $request->input('remaining_images', []); // array

    // 2. Handle new images
    $newImages = [];
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
            $path = $file->move('images');
            $newImages[] = $path;
        }
    }
    
    $finalImages = array_merge($remaining, $newImages);

    $annonce->image = implode(',', $finalImages);

    $annonce->title = $request->title;
    $annonce->price = $request->price;
    $annonce->description = $request->description;
    $annonce->location = $request->location;
    $annonce->category_id = $request->category_id;
    $annonce->save();

    return redirect()->route('annonce.show')->with('success', 'annonce updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(annonce $annonce)
    {
        $annonce->delete();

        return redirect()->route('annonce.show')
            ->with('success', 'annonce deleted successfully.');
    }
}
