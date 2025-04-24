<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Http\Requests\StoreannonceRequest;
use App\Http\Requests\UpdateannonceRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function index()
    {
        return view('dashboard Entreprise.index');
    }

    public function annonceDetail($id)
    {
        $annonce = annonce::findOrFail($id);
        $categories = Category::all();
        
        // Récupérer les informations sur le vendeur
        $user = $annonce->user;
        
        // Récupérer le nombre total d'annonces du vendeur
        $totalAnnonces = annonce::where('user_id', $user->id)->count();
        
        // Récupérer les annonces similaires (même catégorie, mais pas la même annonce)
        $similarAnnonces = annonce::where('category_id', $annonce->category_id)
                        ->where('id', '!=', $annonce->id)
                        ->take(3)
                        ->get();
        
        if($annonce->status == 'draft') {
            return redirect()->route('home')->with('error', 'Cette annonce n\'est pas encore publiée.');
        }
    
        return view('particulier.annonceDetails', compact('annonce', 'categories', 'user', 'totalAnnonces', 'similarAnnonces'));
    }
    // crud annonces

    public function create(){
        $categories = Category::all();
        return view('dashboard entreprise.addannonce', compact('categories'));
    }
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

    public function edit(annonce $annonce)
    {
        $categori = Category::where('id', '=', $annonce->category_id)->get();
        $categories = Category::where('id', '!=', $categori[0]->id)->get();
        return view('dashboard entreprise.editannonce',compact('annonce', 'categories', 'categori'));
    }
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
        $annonce->status = 'draft';
        $annonce->save();

        return redirect()->route('annonce.show')->with('success', 'annonce updated successfully.');
    }

    public function destroy(annonce $annonce)
    {
        $annonce->delete();

        return redirect()->route('annonce.show')
            ->with('success', 'annonce deleted successfully.');
    }
    //annonces by category
    public function annoncesByCategories(Request $request)
    {
        // dd($request->category);
        $categories = Category::all();
        $annonces = annonce::where('category_id', $request->category)->where('status', '=', 'published')->get();
        // dd($annonces);
        return view('particulier.annoncesByCategory', compact('annonces', 'categories'));
    }
}
