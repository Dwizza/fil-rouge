<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create(['name' => $request->name]);
        return back()->with('success', 'Catégorie ajoutée avec succès');
    }

    public function update(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255', 'id' => 'required|integer']);
        Category::where('id', $request->id)->update(['name' => $request->name]);
        return back()->with('success', 'Catégorie modifiée avec succès');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return back()->with('success', 'Catégorie supprimée');
    }

}
