<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::paginate(10);

        return view('artist.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png|max:5096', // Validación de la imagen
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('avatars', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        Artist::create($validatedData);

        return redirect()->route('artists.create')->with('success', 'Artist created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('artist.show', ['artist' => Artist::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $artist = Artist::findOrFail($id);

        return view('artist.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $artist = Artist::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png|max:5096', // Validación de la imagen
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('avatars', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $artist->update($validatedData);

        return Redirect::route('artists.index')->with('success', 'Artist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $artist = Artist::findOrFail($id);

        $artist->delete();

        return Redirect::route('artists.index')->with('success', 'Artist deleted successfully.');
    }
}
