<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;
use Illuminate\Support\Facades\Redirect;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = Label::paginate(10);

        return view('label.index', ['labels' => $labels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('label.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png|max:5096', // Validación de la imagen
        ]);

        // Si se ha subido una imagen, guardarla en el sistema de archivos
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('label_avatars', 'public');
            $validatedData['avatar'] = $avatarPath;
        }

        // Crear y guardar la etiqueta usando los datos validados
        Label::create($validatedData);

        return redirect()->route('labels.create')->with('success', 'Label created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('label.show', ['label' => Label::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        dd(Label::findOrFail($id));
        return view('label.edit', ['label' => Label::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $label = Label::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png|max:5096', // Validación de la imagen
        ]);

        if ($request->hasFile('avatar')) {
            $imagePath = $request->file('avatar')->store('avatars', 'public');
            $validatedData['avatar'] = $imagePath;
        }

        $label->update($validatedData);

        return Redirect::route('labels.index')->with('success', 'Artist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $label = Label::findOrFail($id);

        $label->delete();

        return redirect()->route('labels.index')->with('success', 'Label deleted successfully.');
    }
}
