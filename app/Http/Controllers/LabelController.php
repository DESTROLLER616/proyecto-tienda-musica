<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;

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
        // dd($request->all());
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

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
        return view('label.edit', ['label' => Label::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
